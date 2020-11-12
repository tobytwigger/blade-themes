<?php

namespace Twigger\Tests\Blade\Integration\Foundation;

use Twigger\Blade\Theme;
use Twigger\Blade\Foundation\ThemeStore;
use Twigger\Tests\Blade\LaravelTestCase;

class ThemeTest extends LaravelTestCase
{

    /** @test */
    public function it_can_resolve_the_theme_store(){
        $themeStore = Theme::getFacadeRoot();

        $this->assertInstanceOf(ThemeStore::class, $themeStore);
    }

}
