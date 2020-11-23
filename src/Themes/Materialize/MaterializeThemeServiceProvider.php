<?php

namespace Twigger\Blade\Themes\Materialize;

use Illuminate\Support\ServiceProvider;
use Twigger\Blade\ThemeServiceProvider;

class MaterializeThemeServiceProvider extends ServiceProvider
{

    public function register()
    {
        ThemeServiceProvider::addTheme(new MaterializeTheme());
    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/views', 'materialize-theme');
    }

}

