<?php

namespace Twigger\Blade\Foundation;

use Twigger\Blade\Schema\AbstractSchema;

class SchemaStore
{

    /**
     * @var AbstractSchema[]
     */
    private $schemas = [];

    public function registerSchema(AbstractSchema $schemaDefinition)
    {
        // TODO Only if not duplicate
        $this->schemas[$schemaDefinition::id()] = $schemaDefinition;
    }

    public function hasSchema(string $id)
    {
        return array_key_exists($id, $this->schemas);
    }

    public function getSchema(string $id): AbstractSchema
    {
        if($this->hasSchema($id)) {
            return $this->schemas[$id];
        }
        throw new \Exception(
            sprintf('Schema %s could not be found.', $id)
        );
    }

    /**
     * @return AbstractSchema[]
     */
    public function allSchemas(): array
    {
        return $this->schemas;
    }

}
