<?php

namespace Twigger\Blade\Foundation;

abstract class ThemeDefinition
{
    /**
     * @return string
     */
    abstract public static function name(): string;

    public static function id(): string
    {
        return \Illuminate\Support\Str::kebab(static::name());
    }

    abstract public static function button(): ComponentDefinition;
}
