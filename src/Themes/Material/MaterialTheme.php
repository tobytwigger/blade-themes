<?php

namespace Twigger\Blade\Themes\Material;

use Twigger\Blade\Foundation\ThemeDefinition;
use Twigger\Blade\Themes\Material\Components\Button;
use Twigger\Blade\Themes\Material\Components\Select;

class MaterialTheme extends ThemeDefinition
{

    public function name(): string
    {
        return 'Material';
    }

    public function button(): string
    {
        return Button::class;
    }

    public function select(): string
    {
        return Select::class;
    }

    public function assets(): array
    {
        return [
            '<link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">',
            '<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">',
            '<script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>'
        ];
    }
}
