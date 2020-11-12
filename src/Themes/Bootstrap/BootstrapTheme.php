<?php

namespace Twigger\Blade\Themes\Bootstrap;

use Twigger\Blade\Foundation\ThemeDefinition;
use Twigger\Blade\Themes\Bootstrap\Components\Button;
use Twigger\Blade\Themes\Bootstrap\Components\Select;

class BootstrapTheme extends ThemeDefinition
{

    public function name(): string
    {
        return 'Bootstrap';
    }

    public function button(): string
    {
        return Button::class;
    }

    public function select(): string
    {
        return Select::class;
    }
}
