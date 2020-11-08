<?php

namespace Twigger\Blade\Schema;

use Illuminate\View\Component;

abstract class AbstractSchema extends Component
{

    abstract public static function componentName(): string;

    abstract public static function defaultImplementation(): string;

}
