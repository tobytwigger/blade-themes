<?php

namespace Twigger\Blade\Foundation;

class ComponentLocator
{

    /**
     * @var SchemaStore
     */
    private $schemaStore;

    public function __construct(SchemaStore $schemaStore)
    {
        $this->schemaStore = $schemaStore;
    }

    public function getComponentClassFromId(ThemeDefinition $themeDefinition, string $component): string
    {
        if(method_exists($themeDefinition, $component)) {
            return $themeDefinition::$component();
        }
        return $component::defaultImplementation();
    }

    /** Get all the components from a theme
     * @param ThemeDefinition $themeDefinition
     * @return array
     */
    public function getAllComponentClasses(ThemeDefinition $themeDefinition): array
    {
        $componentClasses = [];
        foreach($this->schemaStore->allSchemas() as $schema) {
            $componentClasses[] = $this->getComponentClassFromId($themeDefinition, $schema::componentName());
        }
        return $componentClasses;
    }

}
