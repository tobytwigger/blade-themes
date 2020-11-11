<?php

namespace Twigger\Tests\Blade\Integration\Foundation;

use Twigger\Blade\Foundation\SchemaDefinition;
use Twigger\Blade\Foundation\SchemaStore;
use Twigger\Tests\Blade\LaravelTestCase;

class SchemaStoreTest extends LaravelTestCase
{

    /** @test */
    public function the_store_is_a_singleton(){
        $schema1 = $this->prophesize(SchemaDefinition::class);
        $schema1->tag()->willReturn('schema1');
        $schema2 = $this->prophesize(SchemaDefinition::class);
        $schema2->tag()->willReturn('schema2');

        app()->make(SchemaStore::class)->registerSchema($schema1->reveal());
        app()->make(SchemaStore::class)->registerSchema($schema2->reveal());

        $this->assertSame([
            'schema1' => $schema1->reveal(),
            'schema2' => $schema2->reveal(),
        ], app()->make(SchemaStore::class)->allSchemas());
    }

}
