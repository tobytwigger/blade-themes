<?php

namespace Twigger\Tests\Blade\Unit\Foundation;

use Twigger\Blade\Foundation\SchemaDefinition;
use Twigger\Blade\Foundation\SchemaStore;
use Twigger\Tests\Blade\TestCase;

class SchemaStoreTest extends TestCase
{

    /** @test */
    public function it_registers_and_returns_all_schemas(){
        SchemaStoreTestDummySchema::$tag = 'schema-definition-1';
        SchemaStoreTestDummySchemaTwo::$tag = 'schema-definition-2';
        SchemaStoreTestDummySchemaThree::$tag = 'schema-definition-3';

        $schemaStore = new SchemaStore();
        $schemaStore->registerSchema(SchemaStoreTestDummySchema::class);
        $schemaStore->registerSchema(SchemaStoreTestDummySchemaTwo::class);
        $schemaStore->registerSchema(SchemaStoreTestDummySchemaThree::class);

        $allSchemas = $schemaStore->allSchemas();

        $this->assertEquals([
            'schema-definition-1' => SchemaStoreTestDummySchema::class,
            'schema-definition-2' => SchemaStoreTestDummySchemaTwo::class,
            'schema-definition-3' => SchemaStoreTestDummySchemaThree::class
        ], $allSchemas);
    }

    /** @test */
    public function it_can_tell_if_a_schema_exists_or_not(){
        SchemaStoreTestDummySchema::$tag = 'schema-definition-1';

        $schemaStore = new SchemaStore();
        $schemaStore->registerSchema(SchemaStoreTestDummySchema::class);

        $this->assertTrue(
            $schemaStore->hasSchema('schema-definition-1')
        );

        $this->assertFalse(
            $schemaStore->hasSchema('schema-definition-2')
        );
    }

    /** @test */
    public function it_can_retrieve_a_schema(){
        SchemaStoreTestDummySchema::$tag = 'schema-definition-1';

        $schemaStore = new SchemaStore();
        $schemaStore->registerSchema(SchemaStoreTestDummySchema::class);

        $this->assertSame(
            SchemaStoreTestDummySchema::class, $schemaStore->getSchema('schema-definition-1')
        );
    }

    /** @test */
    public function it_throws_an_exception_if_a_schema_is_retrieved_that_doesnt_exist(){
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Schema schema-one-test could not be found.');

        $schemaStore = new SchemaStore();
        $schemaStore->getSchema('schema-one-test');
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

class SchemaStoreTestDummySchemaThree extends SchemaDefinition
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
