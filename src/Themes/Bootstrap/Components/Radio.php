<?php


namespace Twigger\Blade\Themes\Bootstrap\Components;


use Twigger\Blade\Docs\DocDescription;

class Radio extends \Twigger\Blade\Schema\Radio
{

    /**
     * @DocDescription(description="Whether the radios should appear next to one another or below one another")
     * @var boolean
     */
    public $inline;

    public function render()
    {
        return view('bootstrap-theme::radio');
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
