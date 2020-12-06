<?php

namespace Twigger\Blade\Themes\Bootstrap\Utils;

trait GeneratesValidationClasses
{

    public function validClasses(): string
    {
        if($this->hasBeenValidated() === true) {
            return ($this->isValid() ? 'is-valid' : 'is-invalid');
        }
        return '';
    }

    abstract public function isValid(): bool;

    abstract public function hasBeenValidated(): bool;

}
