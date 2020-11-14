<?php

namespace Twigger\Tests\Blade\Integration\Foundation;

use Twigger\Blade\Foundation\SchemaDefinition;
use Twigger\Blade\Foundation\SchemaStore;
use Twigger\Tests\Blade\LaravelTestCase;

class SchemaStoreTest extends LaravelTestCase
{

    /** @test */
    public function the_store_is_a_singleton(){
        SchemaStoreTestDummySchema::$tag = 'schema1';
        SchemaStoreTestDummySchemaTwo::$tag = 'schema2';

        app()->make(SchemaStore::class)->registerSchema(SchemaStoreTestDummySchema::class);
        app()->make(SchemaStore::class)->registerSchema(SchemaStoreTestDummySchemaTwo::class);

        $this->assertSame([
            'schema1' => SchemaStoreTestDummySchema::class,
            'schema2' => SchemaStoreTestDummySchemaTwo::class,
        ], app()->make(SchemaStore::class)->allSchemas());
    }

}

class SchemaStoreTestDummySchema extends SchemaDefinition
{

    public static $tag;

    public function render()
    {
    }

    public static function tag(): string
    {
        return static::$tag;
    }

    public static function defaultImplementation(): string
    {
        return '';
    }
}

class SchemaStoreTestDummySchemaTwo extends SchemaDefinition
{

    public static $tag;

    public function render()
    {
    }

    public static function tag(): string
    {
        return static::$tag;
    }

    public static function defaultImplementation(): string
    {
        return '';
    }
}
