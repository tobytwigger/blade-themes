<?php

namespace Twigger\Tests\Blade\Integration\Foundation;

use Illuminate\Support\Facades\Blade;
use Illuminate\View\Compilers\BladeCompiler;
use Twigger\Blade\Foundation\SchemaDefinition;
use Twigger\Blade\Foundation\SchemaStore;
use Twigger\Blade\Foundation\ThemeDefinition;
use Twigger\Blade\Foundation\ThemeLoader;
use Twigger\Blade\Foundation\ThemeStore;
use Twigger\Blade\Schema\Button;
use Twigger\Tests\Blade\LaravelTestCase;

class ThemeLoaderTest extends LaravelTestCase
{

    /** @test */
    public function it_loads_components_registered_in_the_theme(){
        $blade = $this->prophesize(BladeCompiler::class);
        $blade->component(ThemeLoaderTestDummyFirstComponent::class, 'first-component', 'test')->shouldBeCalled();

        Blade::swap($blade->reveal());

        $this->app->make(ThemeStore::class)->registerTheme(new ThemeLoaderTestDummyThemeDefinition());
        $this->app->make(SchemaStore::class)->registerSchema(new ThemeLoaderTestDummyFirstComponent());

        config()->set('themes.tag-prefix', 'test');

        $themeLoader = $this->app->make(ThemeLoader::class);
        $themeLoader->load('some-theme');


    }

    /** @test */
    public function it_loads_components_from_the_default_implementation(){
        $blade = $this->prophesize(BladeCompiler::class);
        $blade->component(ThemeLoaderTestDummySecondComponent::class, 'second-component', 'test2')->shouldBeCalled();

        Blade::swap($blade->reveal());

        $this->app->make(ThemeStore::class)->registerTheme(new ThemeLoaderTestDummyThemeDefinition());
        $this->app->make(SchemaStore::class)->registerSchema(new ThemeLoaderTestDummySecondComponent());

        config()->set('themes.tag-prefix', 'test2');

        $themeLoader = $this->app->make(ThemeLoader::class);
        $themeLoader->load('some-theme');
    }

}

class ThemeLoaderTestDummyThemeDefinition extends ThemeDefinition
{

    public function name(): string
    {
        return 'Some Theme';
    }

    public function firstComponent()
    {
        return ThemeLoaderTestDummyFirstComponent::class;
    }

}

class ThemeLoaderTestDummyFirstComponent extends SchemaDefinition
{

    public function render()
    {
        return '<button>Btn</button>';
    }

    public function tag(): string
    {
        return 'first-component';
    }

    public static function defaultImplementation(): string
    {
        return static::class;
    }
}

class ThemeLoaderTestDummySecondComponent extends SchemaDefinition
{

    public function render()
    {
        return '<button>Btn2</button>';
    }

    public function tag(): string
    {
        return 'second-component';
    }

    public static function defaultImplementation(): string
    {
        return static::class;
    }
}
