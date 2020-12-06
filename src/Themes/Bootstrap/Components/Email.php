<?php

namespace Twigger\Blade\Themes\Bootstrap\Components;

use Twigger\Blade\Themes\Bootstrap\Utils\GeneratesValidationClasses;

class Email extends \Twigger\Blade\Schema\Email
{
    use GeneratesValidationClasses;

    public function hasBeenValidated(): bool
    {
        return $this->validated;
    }

    public function render()
    {
        return view('bootstrap-theme::email');
    }
}
