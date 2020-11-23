<?php

namespace Twigger\Blade\Themes\Bootstrap;

use Illuminate\Support\ServiceProvider;
use Twigger\Blade\Foundation\AssetStore;
use Twigger\Blade\Theme;
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
    }

}

