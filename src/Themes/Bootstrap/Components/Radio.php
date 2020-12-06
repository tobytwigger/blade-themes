<?php


namespace Twigger\Blade\Themes\Bootstrap\Components;


use Twigger\Blade\Docs\DocDescription;
use Twigger\Blade\Themes\Bootstrap\Utils\GeneratesValidationClasses;

class Radio extends \Twigger\Blade\Schema\Radio
{

    use GeneratesValidationClasses;

    public function hasBeenValidated(): bool
    {
        return $this->validated;
    }

    /**
     * @DocDescription(description="Whether the radios should appear next to one another or below one another")
     * @var boolean
     */
    public $inline;

    public function render()
    {
        return view('bootstrap-theme::radio');
    }
}
