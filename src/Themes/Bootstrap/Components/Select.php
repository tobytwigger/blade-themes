<?php

namespace Twigger\Blade\Themes\Bootstrap\Components;

use Twigger\Blade\Schema\Select as SelectSchema;

class Select extends SelectSchema
{

    public function render()
    {
        return view('bootstrap-theme::select');
    }

    public function validClasses(): string
    {
        if($this->validated === true) {
            if($this->isValid() === true) {
                return 'is-valid';
            }
            return 'is-invalid';
        }
        return '';
    }
}
