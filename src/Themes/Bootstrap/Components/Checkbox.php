<?php


namespace Twigger\Blade\Themes\Bootstrap\Components;


use Twigger\Blade\Docs\DocDescription;
use Twigger\Blade\Themes\Bootstrap\Utils\GeneratesValidationClasses;

class Checkbox extends \Twigger\Blade\Schema\Checkbox
{
    use GeneratesValidationClasses;

    public function hasBeenValidated(): bool
    {
        return $this->validated;
    }

    /**
     * @DocDescription(description="Whether checkboxes should appear next to one another or below one another")
     * @var boolean
     */
    public $inline;

    public function render()
    {
        return view('bootstrap-theme::checkbox');
    }

}
