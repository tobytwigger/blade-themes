<?php


namespace Twigger\Blade\Themes\Bootstrap\Components;


class Alert extends \Twigger\Blade\Schema\Alert
{

    public function render()
    {
        return view('bootstrap-theme::alert');
    }
}
