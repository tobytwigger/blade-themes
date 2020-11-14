<?php

namespace Twigger\Tests\Blade\Integration\Foundation\ThemeServiceProvider;

use Twigger\Blade\Foundation\SchemaDefinition;
use Twigger\Blade\Foundation\SchemaStore;
use Twigger\Blade\Foundation\ThemeDefinition;
use Twigger\Blade\Foundation\ThemeStore;
use Twigger\Blade\ThemeServiceProvider;
use Twigger\Tests\Blade\LaravelTestCase;

class ItLoadsSchemaComponentDefaultImplementationsFromTheConfigTest extends LaravelTestCase
{
    /**
     * @var \Prophecy\Prophecy\ObjectProphecy
     */
    private $schema1;
    /**
     * @var \Prophecy\Prophecy\ObjectProphecy
     */
    private $schema2;

    /**
     * Resolve application core configuration implementation.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return void
     */
    protected function resolveApplicationConfiguration($app)
    {
        parent::resolveApplicationConfiguration($app);

        config()->set('themes.theme', null);
        config()->set('themes.components', [
            ItLoadsSchemaComponentDefaultImplementationsFromTheConfigTestDummySchema::class,
            ItLoadsSchemaComponentDefaultImplementationsFromTheConfigTestDummySchemaTwo::class,
        ]);
        $this->setConfig = false;

    }

    /** @test */
    public function test(){

        $schemaStore = $this->app->make(SchemaStore::class);

        $schemas = $schemaStore->allSchemas();

        $this->assertCount(2, $schemas);
        $this->assertArrayHasKey('schema1', $schemas);
        $this->assertArrayHasKey('schema2', $schemas);

        $this->assertEquals(ItLoadsSchemaComponentDefaultImplementationsFromTheConfigTestDummySchemaReal::class, $schemas['schema1']);
        $this->assertEquals(ItLoadsSchemaComponentDefaultImplementationsFromTheConfigTestDummySchemaRealTwo::class, $schemas['schema2']);
    }

}

abstract class ItLoadsSchemaComponentDefaultImplementationsFromTheConfigTestDummySchema extends SchemaDefinition
{

    public static function tag(): string
    {
        return 'schema1';
    }

    public static function defaultImplementation(): string
    {
        return ItLoadsSchemaComponentDefaultImplementationsFromTheConfigTestDummySchemaReal::class;
    }
}

abstract class ItLoadsSchemaComponentDefaultImplementationsFromTheConfigTestDummySchemaTwo extends SchemaDefinition
{

    public static function tag(): string
    {
        return 'schema2';
    }

    public static function defaultImplementation(): string
    {
        return ItLoadsSchemaComponentDefaultImplementationsFromTheConfigTestDummySchemaRealTwo::class;
    }
}

class ItLoadsSchemaComponentDefaultImplementationsFromTheConfigTestDummySchemaReal extends SchemaDefinition
{

    public function render()
    {
        return '<button></button>';
    }

    public static function tag(): string
    {
        return 'schema1';
    }

    public static function defaultImplementation(): string
    {
        return static::class;
    }
}

class ItLoadsSchemaComponentDefaultImplementationsFromTheConfigTestDummySchemaRealTwo extends SchemaDefinition
{

    public function render()
    {
        return '<button></button>';
    }

    public static function tag(): string
    {
        return 'schema2';
    }

    public static function defaultImplementation(): string
    {
        return static::class;
    }
}
