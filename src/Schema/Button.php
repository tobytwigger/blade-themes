<?php

namespace Twigger\Blade\Schema;

use Twigger\Blade\Foundation\SchemaDefinition;
use Twigger\Blade\Themes\Material\Components\Button as MaterialButton;

abstract class Button extends SchemaDefinition
{

    public static function tag(): string
    {
        return 'button';
    }

    public static function defaultImplementation(): string
    {
        return MaterialButton::class;
    }

}
