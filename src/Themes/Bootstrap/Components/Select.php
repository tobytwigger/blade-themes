<?php

namespace Twigger\Blade\Themes\Bootstrap\Components;

use Twigger\Blade\Schema\Select as SelectSchema;
use Twigger\Blade\Themes\Bootstrap\Utils\GeneratesValidationClasses;

class Select extends SelectSchema
{
    use GeneratesValidationClasses;

    public function hasBeenValidated(): bool
    {
        return $this->validated;
    }

    public function render()
    {
        return view('bootstrap-theme::select');
    }

}
