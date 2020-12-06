<?php

namespace Twigger\Blade\Schema;

abstract class Email extends FormInput
{

    public static function tag(): string
    {
        return 'email';
    }

    public static function defaultImplementation(): string
    {
        return \Twigger\Blade\Themes\Bootstrap\Components\Email::class;
    }
}
