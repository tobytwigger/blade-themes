<?php

namespace Twigger\Tests\Blade\Unit\Foundation;

use Illuminate\Contracts\Config\Repository;
use Illuminate\Support\Facades\Blade;
use Illuminate\View\Compilers\BladeCompiler;
use Prophecy\Argument;
use Twigger\Blade\Foundation\SchemaDefinition;
use Twigger\Blade\Foundation\ComponentLocator;
use Twigger\Blade\Foundation\SchemaStore;
use Twigger\Blade\Foundation\AssetStore;
use Twigger\Blade\Foundation\ThemeDefinition;
use Twigger\Blade\Foundation\ThemeLoader;
use Twigger\Blade\Foundation\ThemeStore;
use Twigger\Tests\Blade\TestCase;

class ThemeLoaderTest extends TestCase
{

    /** @test */
    public function it_adds_blade_components_for_each_of_the_schemas()
    {
        $theme = $this->prophesize(ThemeDefinition::class);
        $theme->scripts()->willReturn([]);
        $theme->styles()->willReturn([]);

        $themeStore = $this->prophesize(ThemeStore::class);
        $themeStore->getTheme('test-theme')->willReturn($theme->reveal());

        ThemeLoaderTestDummySchemaOne::$tag = 'component-1';
        ThemeLoaderTestDummySchemaTwo::$tag = 'component-2';

        $schemaStore = $this->prophesize(SchemaStore::class);
        $schemaStore->allSchemas()->willReturn([
            ThemeLoaderTestDummySchemaOne::class,
            ThemeLoaderTestDummySchemaTwo::class
        ]);

        $componentLocator = $this->prophesize(ComponentLocator::class);
        $componentLocator->getComponentClassFromTag(Argument::that(function ($arg) use ($theme) {
            return $theme->reveal() === $arg;
        }), 'component-1')->willReturn('Schema1/Class');
        $componentLocator->getComponentClassFromTag(Argument::that(function ($arg) use ($theme) {
            return $theme->reveal() === $arg;
        }), 'component-2')->willReturn('Schema2/Class');

        $config = $this->prophesize(Repository::class);
        $config->get('themes.tag-prefix', Argument::type('string'))->willReturn('test');

        $scriptStore = $this->prophesize(AssetStore::class);

        $bladeCompiler = $this->prophesize(BladeCompiler::class);
        $bladeCompiler->component('Schema1/Class', 'component-1', 'test')->shouldBeCalled();
        $bladeCompiler->component('Schema2/Class', 'component-2', 'test')->shouldBeCalled();
        Blade::swap($bladeCompiler->reveal());

        $themeLoader = new ThemeLoader(
            $themeStore->reveal(),
            $schemaStore->reveal(),
            $componentLocator->reveal(),
            $scriptStore->reveal(),
            $config->reveal()
        );
        $themeLoader->load('test-theme');
    }

    /** @test */
    public function it_uses_the_given_tag_prefix()
    {
        $theme = $this->prophesize(ThemeDefinition::class);
        $theme->scripts()->willReturn([]);
        $theme->styles()->willReturn([]);

        $themeStore = $this->prophesize(ThemeStore::class);
        $themeStore->getTheme('test-theme')->willReturn($theme->reveal());

        ThemeLoaderTestDummySchemaOne::$tag = 'component-1';
        ThemeLoaderTestDummySchemaTwo::$tag = 'component-2';

        $schemaStore = $this->prophesize(SchemaStore::class);
        $schemaStore->allSchemas()->willReturn([
            ThemeLoaderTestDummySchemaOne::class,
            ThemeLoaderTestDummySchemaTwo::class
        ]);

        $componentLocator = $this->prophesize(ComponentLocator::class);
        $componentLocator->getComponentClassFromTag(Argument::that(function ($arg) use ($theme) {
            return $theme->reveal() === $arg;
        }), 'component-1')->willReturn('Schema1/Class');
        $componentLocator->getComponentClassFromTag(Argument::that(function ($arg) use ($theme) {
            return $theme->reveal() === $arg;
        }), 'component-2')->willReturn('Schema2/Class');

        $config = $this->prophesize(Repository::class);

        $scriptStore = $this->prophesize(AssetStore::class);

        $bladeCompiler = $this->prophesize(BladeCompiler::class);
        $bladeCompiler->component('Schema1/Class', 'component-1', 'some-other-test')->shouldBeCalled();
        $bladeCompiler->component('Schema2/Class', 'component-2', 'some-other-test')->shouldBeCalled();
        Blade::swap($bladeCompiler->reveal());

        $themeLoader = new ThemeLoader(
            $themeStore->reveal(),
            $schemaStore->reveal(),
            $componentLocator->reveal(),
            $scriptStore->reveal(),
            $config->reveal()
        );

        $themeLoader->useTagPrefix('some-other-test');
        $themeLoader->load('test-theme');
    }

    /** @test */
    public function it_loads_scripts()
    {
        $theme = $this->prophesize(ThemeDefinition::class);
        $theme->scripts()->willReturn(['One', 'Two']);
        $theme->styles()->willReturn([]);

        $themeStore = $this->prophesize(ThemeStore::class);
        $themeStore->getTheme('test-theme')->willReturn($theme->reveal());

        $schemaStore = $this->prophesize(SchemaStore::class);
        $schemaStore->allSchemas()->willReturn([]);

        $componentLocator = $this->prophesize(ComponentLocator::class);

        $config = $this->prophesize(Repository::class);

        $scriptStore = $this->prophesize(AssetStore::class);
        $scriptStore->registerScript('One')->shouldBeCalled();
        $scriptStore->registerScript('Two')->shouldBeCalled();

        $themeLoader = new ThemeLoader(
            $themeStore->reveal(),
            $schemaStore->reveal(),
            $componentLocator->reveal(),
            $scriptStore->reveal(),
            $config->reveal()
        );

        $themeLoader->load('test-theme');
    }

    /** @test */
    public function it_loads_styles()
    {
        $theme = $this->prophesize(ThemeDefinition::class);
        $theme->scripts()->willReturn([]);
        $theme->styles()->willReturn(['One', 'Two']);

        $themeStore = $this->prophesize(ThemeStore::class);
        $themeStore->getTheme('test-theme')->willReturn($theme->reveal());

        $schemaStore = $this->prophesize(SchemaStore::class);
        $schemaStore->allSchemas()->willReturn([]);

        $componentLocator = $this->prophesize(ComponentLocator::class);

        $config = $this->prophesize(Repository::class);

        $scriptStore = $this->prophesize(AssetStore::class);
        $scriptStore->registerStyle('One')->shouldBeCalled();
        $scriptStore->registerStyle('Two')->shouldBeCalled();

        $themeLoader = new ThemeLoader(
            $themeStore->reveal(),
            $schemaStore->reveal(),
            $componentLocator->reveal(),
            $scriptStore->reveal(),
            $config->reveal()
        );

        $themeLoader->load('test-theme');
    }

}

class ThemeLoaderTestDummySchemaOne extends SchemaDefinition
{

    public static $tag;

    public function render()
    {
    }

    public static function tag(): string
    {
        return static::$tag;
    }

    public static function defaultImplementation(): string
    {
        return '';
    }
}

class ThemeLoaderTestDummySchemaTwo extends SchemaDefinition
{

    public static $tag;

    public function render()
    {
    }

    public static function tag(): string
    {
        return static::$tag;
    }

    public static function defaultImplementation(): string
    {
        return '';
    }
}
