<?php

namespace Twigger\Blade\Themes\Material;


use Twigger\Blade\Foundation\ComponentDefinition;
use Twigger\Blade\Foundation\ThemeDefinition;
use Twigger\Blade\Themes\Material\Components\Button;

class MaterialTheme extends ThemeDefinition
{

    public static function name(): string
    {
        return 'Material';
    }

    public static function button(): ComponentDefinition
    {
        return ComponentDefinition::define(Button::componentName(), Button::class);
    }
}
