<?php


namespace Twigger\Blade\Themes\Bootstrap\Components;


class FieldSet extends \Twigger\Blade\Schema\FieldSet
{

    public function render()
    {
        return view('bootstrap-theme::fieldset');
    }
}
