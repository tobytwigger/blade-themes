<?php

namespace Twigger\Blade\Foundation;

use Twigger\Blade\Foundation\SchemaDefinition;

class SchemaStore
{

    /**
     * @var SchemaDefinition[]
     */
    private $schemas = [];

    public function registerSchema(SchemaDefinition $schemaDefinition)
    {
        // TODO Only if not duplicate
        $this->schemas[$schemaDefinition->tag()] = $schemaDefinition;
    }

    public function hasSchema(string $id)
    {
        return array_key_exists($id, $this->schemas);
    }

    public function getSchema(string $id): SchemaDefinition
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
