<?php

namespace Twigger\Blade\Foundation;

use Twigger\Blade\Schema\Button;

class SchemaStore
{

    /**
     * @var SchemaDefinition[]
     */
    private $schemas = [];

    public function registerSchema(string $class)
    {
        if(!is_subclass_of($class, SchemaDefinition::class)) {
            throw new \Exception(sprintf('The schema class [%s] must extend %s', $class, SchemaDefinition::class));
        }
        $this->schemas[$class::tag()] = $class;
    }

    public function hasSchema(string $id)
    {
        return array_key_exists($id, $this->schemas);
    }

    public function getSchema(string $id): string
    {
        if($this->hasSchema($id)) {
            return $this->schemas[$id];
        }
        throw new \Exception(
            sprintf('Schema %s could not be found.', $id)
        );
    }

    /**
     * @return SchemaDefinition[]
     */
    public function allSchemas(): array
    {
        return $this->schemas;
    }

}
