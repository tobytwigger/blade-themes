<?php


namespace Twigger\Blade\Themes\Bootstrap\Components;


use Twigger\Blade\Docs\DocDescription;

class Checkbox extends \Twigger\Blade\Schema\Checkbox
{

    /**
     * @DocDescription(description="Whether checkboxes should appear next to one another or below one another")
     * @var boolean
     */
    public $inline;

    public function render()
    {
        return view('bootstrap-theme::checkbox');
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
