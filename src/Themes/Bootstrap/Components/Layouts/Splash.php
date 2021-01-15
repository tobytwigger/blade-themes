<?php

namespace Twigger\Blade\Themes\Bootstrap\Components\Layouts;

use Twigger\Blade\Schema\Layouts\Splash as SplashSchema;

class Splash extends SplashSchema
{

    public function render()
    {
        return view('bootstrap-theme::layouts.splash');
    }
}
