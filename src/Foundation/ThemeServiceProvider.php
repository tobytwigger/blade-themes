<?php

namespace Twigger\Blade\Foundation;

use Illuminate\Support\ServiceProvider;
use Twigger\Blade\Themes\Material\MaterialTheme;

class ThemeServiceProvider extends ServiceProvider
{

    protected $themes = [
        MaterialTheme::class
    ];

    public function register()
    {
        $this->app->singleton(ThemeStore::class);
    }

    public function boot()
    {
        $this->registerThemes();
        // TODO Allow themes to publish js files


        // TODO can call component ->ifTheme('material', function($component) {
        // sth here on component and return it IF the theme is material. Allows us to use custom features from frameworks.
        //}
    }

    private function registerThemes()
    {
        foreach($this->themes as $theme) {
            Theme::registerTheme($theme);
        }
    }

}

