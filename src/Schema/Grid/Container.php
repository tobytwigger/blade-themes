<?php

namespace Twigger\Blade\Schema\Grid;

use Twigger\Blade\Foundation\SchemaDefinition;

abstract class Container extends SchemaDefinition
{

    public static function tag(): string
    {
        return 'container';
    }

    public static function defaultImplementation(): string
    {
        return \Twigger\Blade\Themes\Bootstrap\Components\Grid\Container::class;
    }
}
