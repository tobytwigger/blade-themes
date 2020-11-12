<?php

namespace Twigger\Blade\Foundation;

use Illuminate\Support\Str;
use Illuminate\View\Component;

abstract class SchemaDefinition extends Component
{

    abstract public static function tag(): string;

    abstract public static function defaultImplementation(): string;

}
