<?php

namespace Twigger\Blade\Themes\Material;

use Illuminate\Support\ServiceProvider;
use Twigger\Blade\Foundation\AssetStore;
use Twigger\Blade\Theme;
use Twigger\Blade\ThemeServiceProvider;

class MaterialThemeServiceProvider extends ServiceProvider
{

    public function register()
    {
        ThemeServiceProvider::addTheme(new MaterialTheme());
    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/views', 'material-theme');
    }

}

