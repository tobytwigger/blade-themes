<?php

namespace Twigger\Tests\Blade\Unit\Foundation;

use Twigger\Blade\Foundation\SchemaDefinition;
use Twigger\Blade\Foundation\SchemaStore;
use Twigger\Tests\Blade\TestCase;

class SchemaStoreTest extends TestCase
{


    private function makeSchemaDefinition(string $id)
    {
        $schemaDefinition = $this->prophesize(SchemaDefinition::class);
        $schemaDefinition->tag()->willReturn($id);
        return $schemaDefinition;
    }

    /** @test */
    public function it_registers_and_returns_all_schemas(){
        $schemaDefinition1 = $this->makeSchemaDefinition('schema-definition-1');
        $schemaDefinition2 = $this->makeSchemaDefinition('schema-definition-2');
        $schemaDefinition3 = $this->makeSchemaDefinition('schema-definition-3');

        $schemaStore = new SchemaStore();
        $schemaStore->registerSchema($schemaDefinition1->reveal());
        $schemaStore->registerSchema($schemaDefinition2->reveal());
        $schemaStore->registerSchema($schemaDefinition3->reveal());

        $allSchemas = $schemaStore->allSchemas();

        $this->assertSame([
            'schema-definition-1' => $schemaDefinition1->reveal(),
            'schema-definition-2' => $schemaDefinition2->reveal(),
            'schema-definition-3' => $schemaDefinition3->reveal()
        ], $allSchemas);
        $this->assertSame($schemaDefinition1->reveal(),  $allSchemas['schema-definition-1']);
        $this->assertSame($schemaDefinition2->reveal(),  $allSchemas['schema-definition-2']);
        $this->assertSame($schemaDefinition3->reveal(),  $allSchemas['schema-definition-3']);
    }

    /** @test */
    public function it_can_tell_if_a_schema_exists_or_not(){
        $schemaDefinition1 = $this->makeSchemaDefinition('schema-definition-1');

        $schemaStore = new SchemaStore();
        $schemaStore->registerSchema($schemaDefinition1->reveal());

        $this->assertTrue(
            $schemaStore->hasSchema('schema-definition-1')
        );

        $this->assertFalse(
            $schemaStore->hasSchema('schema-definition-2')
        );
    }

    /** @test */
    public function it_can_retrieve_a_schema(){
        $schemaDefinition1 = $this->makeSchemaDefinition('schema-definition-1');

        $schemaStore = new SchemaStore();
        $schemaStore->registerSchema($schemaDefinition1->reveal());

        $this->assertSame(
            $schemaDefinition1->reveal(), $schemaStore->getSchema('schema-definition-1')
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
