<?php

namespace Twigger\Blade\Schema\Layouts;

use Twigger\Blade\Foundation\SchemaDefinition;

abstract class Splash extends SchemaDefinition
{

    public static function tag(): string
    {
        return 'layout-splash';
    }

    public static function defaultImplementation(): string
    {
        return \Twigger\Blade\Themes\Bootstrap\Components\Layouts\Splash::class;
    }
}
