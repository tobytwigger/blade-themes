<?php

namespace Twigger\Blade\Themes\Bootstrap;

use Illuminate\Support\ServiceProvider;
use Twigger\Blade\ThemeServiceProvider;

class BootstrapThemeServiceProvider extends ServiceProvider
{

    public function register()
    {
        ThemeServiceProvider::addTheme(new BootstrapTheme());
    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/views', 'bootstrap-theme');

        $this->publishes([__DIR__ . '/styles/customisation.css' => public_path('vendor/themes/bootstrap/customisation.css')]);
    }

}

