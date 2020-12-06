<?php

namespace Twigger\Blade\Schema;

abstract class Text extends FormInput
{

    public static function tag(): string
    {
        return 'text';
    }

    public static function defaultImplementation(): string
    {
        return \Twigger\Blade\Themes\Bootstrap\Components\Text::class;
    }
}
