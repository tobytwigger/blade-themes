<?php

namespace Twigger\Tests\Blade\Unit\Foundation;

use Twigger\Blade\Foundation\ThemeDefinition;
use Twigger\Blade\Foundation\ThemeStore;
use Twigger\Tests\Blade\TestCase;

class ThemeStoreTest extends TestCase
{

    private function makeThemeDefinition(string $id)
    {
        $themeDefinition = $this->prophesize(ThemeDefinition::class);
        $themeDefinition->id()->willReturn($id);
        return $themeDefinition;
    }

    /** @test */
    public function it_registers_and_returns_all_themes(){
        $themeDefinition1 = $this->makeThemeDefinition('theme-definition-1');
        $themeDefinition2 = $this->makeThemeDefinition('theme-definition-2');
        $themeDefinition3 = $this->makeThemeDefinition('theme-definition-3');

        $themeStore = new ThemeStore();
        $themeStore->registerTheme($themeDefinition1->reveal());
        $themeStore->registerTheme($themeDefinition2->reveal());
        $themeStore->registerTheme($themeDefinition3->reveal());

        $allThemes = $themeStore->allThemes();

        $this->assertSame([
            'theme-definition-1' => $themeDefinition1->reveal(),
            'theme-definition-2' => $themeDefinition2->reveal(),
            'theme-definition-3' => $themeDefinition3->reveal()
        ], $allThemes);
        $this->assertSame($themeDefinition1->reveal(),  $allThemes['theme-definition-1']);
        $this->assertSame($themeDefinition2->reveal(),  $allThemes['theme-definition-2']);
        $this->assertSame($themeDefinition3->reveal(),  $allThemes['theme-definition-3']);
    }

    /** @test */
    public function it_can_tell_if_a_theme_exists_or_not(){
        $themeDefinition1 = $this->makeThemeDefinition('theme-definition-1');

        $themeStore = new ThemeStore();
        $themeStore->registerTheme($themeDefinition1->reveal());

        $this->assertTrue(
            $themeStore->hasTheme('theme-definition-1')
        );

        $this->assertFalse(
            $themeStore->hasTheme('theme-definition-2')
        );
    }

    /** @test */
    public function it_can_retrieve_a_theme(){
        $themeDefinition1 = $this->makeThemeDefinition('theme-definition-1');

        $themeStore = new ThemeStore();
        $themeStore->registerTheme($themeDefinition1->reveal());

        $this->assertSame(
            $themeDefinition1->reveal(), $themeStore->getTheme('theme-definition-1')
        );
    }

    /** @test */
    public function it_throws_an_exception_if_a_theme_is_retrieved_that_doesnt_exist(){
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Theme theme-one-test could not be found.');

        $themeStore = new ThemeStore();
        $themeStore->getTheme('theme-one-test');
    }

    /** @test */
    public function count_returns_the_number_of_themes(){
        $themeDefinition1 = $this->makeThemeDefinition('theme-definition-1');
        $themeDefinition2 = $this->makeThemeDefinition('theme-definition-2');
        $themeDefinition3 = $this->makeThemeDefinition('theme-definition-3');

        $themeStore = new ThemeStore();
        $themeStore->registerTheme($themeDefinition1->reveal());
        $themeStore->registerTheme($themeDefinition2->reveal());
        $themeStore->registerTheme($themeDefinition3->reveal());

        $this->assertEquals(3, $themeStore->count());
    }

}
