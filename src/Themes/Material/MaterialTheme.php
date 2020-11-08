<?php

namespace Twigger\Blade\Themes\Material;


use Twigger\Blade\Foundation\ComponentDefinition;
use Twigger\Blade\Foundation\ThemeDefinition;
use Twigger\Blade\Themes\Material\Components\Button;

class MaterialTheme extends ThemeDefinition
{

    public function name(): string
    {
        return 'Material';
    }

    public function button(): string
    {
        return Button::class;
    }
}
