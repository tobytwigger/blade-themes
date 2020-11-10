<?php

namespace Twigger\Tests\Blade\Unit\Foundation;

use Twigger\Blade\Foundation\ThemeDefinition;
use Twigger\Tests\Blade\TestCase;

class ThemeDefinitionTest extends TestCase
{

    /** @test */
    public function id_returns_the_kebab_case_of_the_name(){
        $themeDefinition = new ThemeDefinitionTestDummyThemeDefinition();
        $themeDefinition->setName('Some Name with some sPaceS and CAPITAls.');

        $this->assertEquals('some-name-with-some-s-pace-s-and-c-a-p-i-t-als.', $themeDefinition->id());
    }

}

class ThemeDefinitionTestDummyThemeDefinition extends ThemeDefinition
{

    private $name;

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function name(): string
    {
        return $this->name;
    }
}
