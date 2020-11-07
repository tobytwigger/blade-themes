<?php

namespace Twigger\Blade\Schema;

use Illuminate\View\Component;
use Twigger\Blade\Foundation\ComponentDefinition;

abstract class AbstractSchema extends Component
{

    abstract public static function componentName(): string;

}
