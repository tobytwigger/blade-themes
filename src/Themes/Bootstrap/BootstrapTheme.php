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

    public function styles(): array
    {
        return [
            '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">',
        ];
    }

    public function scripts(): array
    {
        return [
            '<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>',
            '<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>'
        ];
    }

}
