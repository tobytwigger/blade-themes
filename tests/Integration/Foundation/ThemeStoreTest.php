<?php

namespace Twigger\Tests\Blade\Integration\Foundation;

use Twigger\Blade\Foundation\ThemeDefinition;
use Twigger\Blade\Foundation\ThemeStore;
use Twigger\Tests\Blade\LaravelTestCase;

class ThemeStoreTest extends LaravelTestCase
{

    /** @test */
    public function the_store_is_a_singleton(){
        $theme1 = $this->prophesize(ThemeDefinition::class);
        $theme1->id()->willReturn('theme1');
        $theme2 = $this->prophesize(ThemeDefinition::class);
        $theme2->id()->willReturn('theme2');

        app()->make(ThemeStore::class)->registerTheme($theme1->reveal());
        app()->make(ThemeStore::class)->registerTheme($theme2->reveal());

        $this->assertSame([
            'theme1' => $theme1->reveal(),
            'theme2' => $theme2->reveal(),
        ], app()->make(ThemeStore::class)->allThemes());
    }

}
