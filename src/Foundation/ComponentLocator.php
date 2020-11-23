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

    /**
     * Get the fully namespaced class for the given schema.
     *
     * @param ThemeDefinition $themeDefinition The theme to resolve the schema class from
     * @param string $tag  The tag used to find the schema.
     * @return string The full namespaced class representing a themed component that extends a schema.
     * @throws \Exception
     */
    public function getComponentClassFromTag(ThemeDefinition $themeDefinition, string $tag): string
    {
        $componentMethod = Str::camel($tag);
        if(method_exists($themeDefinition, Str::camel($componentMethod))) {
            return $themeDefinition->$componentMethod();
        }
        if($this->schemaStore->hasSchema($tag)) {
            $schema = $this->schemaStore->getSchema($tag);
            return $schema::defaultImplementation();
        }
        throw new \Exception(
            sprintf('Could not find the component [%s]', $tag)
        );
    }

    /**
     * Get the class of the component that can be created.
     *
     * If a schema class is given, the default implementation will be returned. If an implementation is given, the
     * implementation will be returned.
     *
     * @param string $schemaClass
     * @return string
     * @throws \ReflectionException
     */
    public function getImplementationClassFromSchema(string $schemaClass): string
    {
        if(class_exists($schemaClass) && is_subclass_of($schemaClass, SchemaDefinition::class)) {
            $reflectionClass = new \ReflectionClass($schemaClass);
            if($reflectionClass->isInstantiable()) {
                return $schemaClass;
            }
            if(method_exists($schemaClass, 'defaultImplementation')) {
                return $schemaClass::defaultImplementation();
            }
        }
        throw new \Exception(
            sprintf('A schema class could not be found for schema %s', $schemaClass)
        );
    }
}
