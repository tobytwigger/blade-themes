<?php

namespace Twigger\Blade\Schema;

abstract class Password extends FormInput
{

    public static function tag(): string
    {
        return 'password';
    }

    public static function defaultImplementation(): string
    {
        return \Twigger\Blade\Themes\Bootstrap\Components\Password::class;
    }
}
