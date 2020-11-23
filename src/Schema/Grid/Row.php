<?php

namespace Twigger\Blade\Schema\Grid;

use Twigger\Blade\Foundation\SchemaDefinition;

abstract class Row extends SchemaDefinition
{

    public static function tag(): string
    {
        return 'row';
    }

    public static function defaultImplementation(): string
    {
        return \Twigger\Blade\Themes\Bootstrap\Components\Grid\Row::class;
    }
}
