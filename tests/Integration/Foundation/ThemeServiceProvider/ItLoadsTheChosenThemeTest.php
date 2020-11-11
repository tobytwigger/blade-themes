<?php

namespace Twigger\Tests\Blade\Integration\Foundation\ThemeServiceProvider;

use Twigger\Blade\Foundation\ThemeDefinition;
use Twigger\Blade\Foundation\ThemeLoader;
use Twigger\Blade\ThemeServiceProvider;
use Twigger\Tests\Blade\LaravelTestCase;

class ItLoadsTheChosenThemeTest extends LaravelTestCase
{

    /**
     * @var \Prophecy\Prophecy\ObjectProphecy
     */
    private $themeLoader;
    /**
     * @var \Prophecy\Prophecy\ObjectProphecy
     */
    private $theme1;

    /**
     * Resolve application core configuration implementation.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return void
     */
    protected function resolveApplicationConfiguration($app)
    {
        parent::resolveApplicationConfiguration($app);

        $this->theme1 = $this->prophesize(ThemeDefinition::class);
        $this->theme1->id()->willReturn('my-theme');

        ThemeServiceProvider::addTheme($this->theme1->reveal());

        $this->themeLoader = $this->prophesize(ThemeLoader::class);
        app()->instance(ThemeLoader::class, $this->themeLoader->reveal());

        ThemeServiceProvider::useTheme('my-theme');

    }

    /** @test */
    public function test(){
        $this->themeLoader->load('my-theme')->shouldHaveBeenCalled();
    }

    protected function tearDown(): void
    {
        ThemeServiceProvider::$themes = [];
        ThemeServiceProvider::$theme = null;
    }

}
