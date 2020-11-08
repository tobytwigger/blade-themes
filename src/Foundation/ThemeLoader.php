<?php

namespace Twigger\Blade\Foundation;

use Illuminate\Support\Facades\Blade;

class ThemeLoader
{

    /**
     * @var ThemeStore
     */
    private $store;
    /**
     * @var ComponentLocator
     */
    private $componentLocator;

    /**
     * @var SchemaStore
     */
    private $schemaStore;

    public function __construct(ThemeStore $store, SchemaStore $schemaStore, ComponentLocator $componentLocator)
    {
        $this->store = $store;
        $this->schemaStore = $componentLocator;
        $this->schemaStore = $schemaStore;
    }

    public function load(string $theme)
    {
        $themeDefinition = $this->store->getTheme($theme);

        foreach($this->schemaStore->allSchemas() as $schema) {
            Blade::component('theme::' . $schema::componentName(), $this->componentLocator->getComponentClassFromId($themeDefinition, $schema::componentName()));
        }
    }

}
