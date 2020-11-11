<?php

namespace Twigger\Tests\Blade\Integration\Foundation\ThemeServiceProvider;

use Twigger\Blade\Foundation\ThemeDefinition;
use Twigger\Blade\Foundation\ThemeStore;
use Twigger\Blade\ThemeServiceProvider;
use Twigger\Tests\Blade\LaravelTestCase;

class ItRegistersASingleThemeTest extends LaravelTestCase
{
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
        $this->theme1->id()->willReturn('theme1');

        ThemeServiceProvider::addTheme($this->theme1->reveal());
    }

    /** @test */
    public function test(){

        $themeStore = $this->app->make(ThemeStore::class);

        $this->assertSame([
            'theme1' => $this->theme1->reveal(),
        ], $themeStore->allThemes());

    }

    protected function tearDown(): void
    {
        ThemeServiceProvider::$themes = [];
        ThemeServiceProvider::$theme = null;
    }

}
