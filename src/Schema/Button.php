<?php

namespace Twigger\Blade\Schema;

use Twigger\Blade\Foundation\AbstractSchema;

abstract class Button extends AbstractSchema
{

    public static function componentName(): string
    {
        return 'button';
    }

}
