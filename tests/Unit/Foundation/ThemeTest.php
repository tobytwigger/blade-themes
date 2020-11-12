<?php

namespace Twigger\Tests\Blade\Unit\Foundation;

use Twigger\Blade\Theme;
use Twigger\Blade\Foundation\ThemeStore;
use Twigger\Tests\Blade\TestCase;

class ThemeTest extends TestCase
{

    /** @test */
    public function it_registers_the_correct_facade_accessor(){
        $facadeAccessor = new \ReflectionMethod(Theme::class, 'getFacadeAccessor');
        $facadeAccessor->setAccessible(true);

        $this->assertEquals(
            ThemeStore::class, $facadeAccessor->invoke(null)
        );
    }

}
