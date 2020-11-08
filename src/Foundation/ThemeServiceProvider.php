<?php

namespace Twigger\Blade\Foundation;

use Illuminate\Contracts\Config\Repository as Config;
use Illuminate\Support\ServiceProvider;
use Twigger\Blade\Themes\Material\MaterialTheme;

class ThemeServiceProvider extends ServiceProvider
{

    protected static $themes = [
        MaterialTheme::class
    ];

    public static $theme = null;

    public function register()
    {
        $this->app->singleton(ThemeStore::class);
        $this->app->singleton(SchemaStore::class);
        $this->registerConfig();
    }

    public function addTheme(string $theme)
    {
        static::$themes[] = $theme;
    }

    public function useTheme(string $theme)
    {
        static::$theme = $theme;
    }

    public function boot()
    {
        $this->registerThemes();
        $this->registerSchemas();

        $this->app->make(ThemeLoader::class)->load(
            static::$theme ?? config('themes.theme')
        );


        // TODO can call component ->ifTheme('material', function($component) {
        // sth here on component and return it IF the theme is material. Allows us to use custom features from frameworks.
        //}
    }

    private function registerConfig()
    {
        $this->publishes([__DIR__.'/../config/themes.php' => config_path('themes.php')], 'config');
        $this->mergeConfigFrom(__DIR__.'/../config/themes.php', 'themes');
    }

    private function registerThemes()
    {
        foreach($this->themes as $theme) {
            Theme::registerTheme($theme);
        }
    }

    private function registerSchemas()
    {
        $schemaStore = $this->app->make(SchemaStore::class);
        foreach($this->app->make(Config::class) as $schema) {
            $schemaStore->registerSchema($schema);
        }
    }

}

