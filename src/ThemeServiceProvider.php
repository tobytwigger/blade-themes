<?php

namespace Twigger\Blade;

use Illuminate\Contracts\Cache\Repository;
use Illuminate\Contracts\Config\Repository as Config;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\ServiceProvider;
use Twigger\Blade\Foundation\ComponentLocator;
use Twigger\Blade\Foundation\SchemaStore;
use Twigger\Blade\Theme;
use Twigger\Blade\Foundation\ThemeDefinition;
use Twigger\Blade\Foundation\ThemeLoader;
use Twigger\Blade\Foundation\ThemeStore;
use Twigger\Blade\Themes\Material\MaterialTheme;

class ThemeServiceProvider extends ServiceProvider
{

    public static $themes = [];

    public static $theme = null;

    public function register()
    {
        $this->app->singleton(ThemeStore::class);
        $this->app->singleton(SchemaStore::class);
        $this->registerConfig();
    }

    public static function addTheme(ThemeDefinition $theme)
    {
        static::$themes[] = $theme;
    }

    public static function useTheme(string $theme)
    {
        static::$theme = $theme;
    }

    public function boot()
    {
        static::addTheme(new MaterialTheme());

        $this->loadViewsFrom(__DIR__ . '/views', 'theme');

        $this->registerThemes();
        $this->registerSchemas();
        $this->loadTheme();

        // TODO can call component ->ifTheme('material', function($component) {
        // sth here on component and return it IF the theme is material. Allows us to use custom features from frameworks.
        //}
    }

    private function loadTheme()
    {
        $themeToLoad = static::$theme ?? config('themes.theme');

        if($this->app->make(Repository::class)->pull(static::class . '.cachedTheme') !== $themeToLoad) {
            Artisan::call('view:clear');
        }

        $this->app->make(ThemeLoader::class)->load($themeToLoad);
    }

    private function registerConfig()
    {
        $this->publishes([__DIR__.'/../config/themes.php' => config_path('themes.php')], 'config');
        $this->mergeConfigFrom(__DIR__.'/../config/themes.php', 'themes');
    }

    private function registerThemes()
    {
        foreach(static::$themes as $theme) {
            Theme::registerTheme($theme);
        }
    }

    private function registerSchemas()
    {
        $schemaStore = $this->app->make(SchemaStore::class);
        $componentLocator = $this->app->make(ComponentLocator::class);

        foreach($this->app->make(Config::class)->get('themes.components') as $schema) {
            if($schema === 'Twigger\Blade\Schema\Select') {
                $class = $componentLocator->getImplementationClassFromSchema($schema);
            }
            $class = $componentLocator->getImplementationClassFromSchema($schema);
            $schemaStore->registerSchema(
                $this->app->make($class)
            );
        }

    }

}

