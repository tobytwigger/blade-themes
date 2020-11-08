<?php

namespace Twigger\Blade\Schema;

abstract class Button extends AbstractSchema
{

    public static function componentName(): string
    {
        return 'button';
    }

}
