<?php

namespace Twigger\Blade\Schema;

use Twigger\Blade\Foundation\SchemaDefinition;

abstract class FormGroup extends SchemaDefinition
{

    public static function tag(): string
    {
        return 'form-group';
    }

    public static function defaultImplementation(): string
    {
        return \Twigger\Blade\Themes\Bootstrap\Components\FormGroup::class;
    }
}
