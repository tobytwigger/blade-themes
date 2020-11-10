<?php

namespace Twigger\Tests\Blade\Unit\Foundation;

use Illuminate\Contracts\Config\Repository;
use Illuminate\Support\Facades\Blade;
use Illuminate\View\Compilers\BladeCompiler;
use Prophecy\Argument;
use Twigger\Blade\Foundation\SchemaDefinition;
use Twigger\Blade\Foundation\ComponentLocator;
use Twigger\Blade\Foundation\SchemaStore;
use Twigger\Blade\Foundation\ThemeDefinition;
use Twigger\Blade\Foundation\ThemeLoader;
use Twigger\Blade\Foundation\ThemeStore;
use Twigger\Tests\Blade\TestCase;

class ThemeLoaderTest extends TestCase
{

    /** @test */
    public function it_adds_blade_components_for_each_of_the_schemas(){
        $theme = $this->prophesize(ThemeDefinition::class);

        $themeStore = $this->prophesize(ThemeStore::class);
        $themeStore->getTheme('test-theme')->willReturn($theme->reveal());

        $schema1 = $this->prophesize(SchemaDefinition::class);
        $schema1->tag()->willReturn('component-1');
        $schema2 = $this->prophesize(SchemaDefinition::class);
        $schema2->tag()->willReturn('component-2');

        $schemaStore = $this->prophesize(SchemaStore::class);
        $schemaStore->allSchemas()->willReturn([
            $schema1->reveal(),
            $schema2->reveal()
        ]);

        $componentLocator = $this->prophesize(ComponentLocator::class);
        $componentLocator->getComponentClassFromId(Argument::that(function($arg) use ($theme) {
            return $theme->reveal() === $arg;
        }), 'component-1')->willReturn('Schema1/Class');
        $componentLocator->getComponentClassFromId(Argument::that(function($arg) use ($theme) {
            return $theme->reveal() === $arg;
        }), 'component-2')->willReturn('Schema2/Class');

        $config = $this->prophesize(Repository::class);
        $config->get('tag-prefix', Argument::type('string'))->willReturn('test');

        $bladeCompiler = $this->prophesize(BladeCompiler::class);
        $bladeCompiler->component('Schema1/Class', 'component-1', 'test')->shouldBeCalled();
        $bladeCompiler->component('Schema2/Class', 'component-2', 'test')->shouldBeCalled();
        Blade::swap($bladeCompiler->reveal());

        $themeLoader = new ThemeLoader(
            $themeStore->reveal(),
            $schemaStore->reveal(),
            $componentLocator->reveal(),
            $config->reveal()
        );
        $themeLoader->load('test-theme');
    }

}
