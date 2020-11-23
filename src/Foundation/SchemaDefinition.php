<?php

namespace Twigger\Blade\Foundation;

use Illuminate\Support\Str;
use Illuminate\View\Component;

abstract class SchemaDefinition extends Component
{

    /**
     * Get a given attribute from the attribute array.
     *
     * @param  string  $key
     * @param  mixed  $default
     * @return mixed
     */
    public function get($key, $default = null)
    {
        return $this->attributes->get($key, $default);
    }

    public function has($key)
    {
        return $this->attributes->offsetExists($key);
    }

    abstract public static function tag(): string;

    abstract public static function defaultImplementation(): string;

}
