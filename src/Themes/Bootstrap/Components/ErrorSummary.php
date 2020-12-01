<?php


namespace Twigger\Blade\Themes\Bootstrap\Components;


class ErrorSummary extends \Twigger\Blade\Schema\ErrorSummary
{

    public function render()
    {
        return view('bootstrap-theme::error-summary');
    }
}
