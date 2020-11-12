<?php

namespace Twigger\Blade\Themes\Material;

use Illuminate\Support\ServiceProvider;
use Twigger\Blade\Foundation\ScriptStore;
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
        $this->app->make(ScriptStore::class)->registerScript(
            '<link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">'
        );

        $this->app->make(ScriptStore::class)->registerScript(
            '<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">'
        );

        $this->app->make(ScriptStore::class)->registerScript(
            '<script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>'
        );

        $this->loadViewsFrom(__DIR__.'/views', 'material-theme');
    }

}

