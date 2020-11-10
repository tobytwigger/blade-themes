<?php

namespace Twigger\Blade\Foundation;

use Illuminate\Support\Str;

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

    public function getComponentClassFromId(ThemeDefinition $themeDefinition, string $componentId): string
    {
        $componentMethod = Str::camel($componentId);
        if(method_exists($themeDefinition, Str::camel($componentMethod))) {
            return $themeDefinition->$componentMethod();
        }
        if($this->schemaStore->hasSchema($componentId)) {
            $schema = $this->schemaStore->getSchema($componentId);
            return $schema::defaultImplementation();
        }
        throw new \Exception(
            sprintf('Could not find the component [%s]', $componentId)
        );
    }

}
