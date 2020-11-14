<?php

namespace Twigger\Blade\Foundation;

use Illuminate\Contracts\Config\Repository as Config;
use Illuminate\Support\Facades\Blade;

class ThemeLoader
{

    /**
     * @var ThemeStore
     */
    private $themeStore;

    /**
     * @var ComponentLocator
     */
    private $componentLocator;

    /**
     * @var SchemaStore
     */
    private $schemaStore;

    /**
     * @var Config
     */
    private $config;

    /**
     * The prefix to use
     *
     * @var string
     */
    private $tagPrefix = null;

    public function __construct(ThemeStore $themeStore, SchemaStore $schemaStore, ComponentLocator $componentLocator, Config $config)
    {
        $this->themeStore = $themeStore;
        $this->componentLocator = $componentLocator;
        $this->schemaStore = $schemaStore;
        $this->config = $config;
    }

    public function load(string $theme)
    {
        $themeDefinition = $this->themeStore->getTheme($theme);
        foreach($this->schemaStore->allSchemas() as $schema) {
            Blade::component(
                $this->componentLocator->getComponentClassFromTag($themeDefinition, $schema::tag()),
                $schema::tag(),
                $this->getTagPrefix()
            );
        }
    }

    /**
     * Return the prefix for the tag
     *
     * @return string
     */
    private function getTagPrefix(): string
    {
        if($this->tagPrefix !== null) {
            return $this->tagPrefix;
        }
        return $this->config->get('themes.tag-prefix', 'theme');
    }

    /**
     * Use a different theme tag prefix to the one in the config
     *
     * @param string $prefix
     * @return string
     */
    public function useTagPrefix(string $prefix)
    {
        $this->tagPrefix = $prefix;
    }

}
