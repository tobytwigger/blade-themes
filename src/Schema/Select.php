<?php

namespace Twigger\Blade\Schema;

use Twigger\Blade\Foundation\SchemaDefinition;
use Twigger\Blade\Themes\Material\Components\Select as MaterialSelect;

abstract class Select extends SchemaDefinition
{

    public function tag(): string
    {
        return 'select';
    }

    public static function defaultImplementation(): string
    {
        return MaterialSelect::class;
    }

}
