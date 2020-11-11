<?php

namespace Twigger\Tests\Blade\Unit\Foundation;

use Twigger\Blade\Foundation\SchemaDefinition;
use Twigger\Blade\Foundation\ComponentLocator;
use Twigger\Blade\Foundation\SchemaStore;
use Twigger\Blade\Foundation\ThemeDefinition;
use Twigger\Tests\Blade\TestCase;

class ComponentLocatorTest extends TestCase
{

    /** @test */
    public function it_gets_the_component_class_name_from_the_theme_definition(){
        $themeDefinition = new ComponentLocatorTestDummyThemeDefinition();
        $someSchema = $this->prophesize(SchemaDefinition::class);
        $themeDefinition->someSchemaReturns(get_class($someSchema->reveal()));

        $schemaStore = $this->prophesize(SchemaStore::class);

        $componentLocator = new ComponentLocator($schemaStore->reveal());
        $this->assertSame(
            $componentLocator->getComponentClassFromTag($themeDefinition, 'some-schema'),
            get_class($someSchema->reveal())
        );
    }

    /** @test */
    public function it_gets_the_component_class_name_from_the_schema_default_if_the_theme_does_not_register_it(){
        $themeDefinition = new ComponentLocatorTestDummyThemeDefinition();
        $someSchema = new ComponentLocatorTestDummySchemaDefinition();
        $someSchema::$defaultImplementation = 'My/Component/Implementation';

        $schemaStore = $this->prophesize(SchemaStore::class);
        $schemaStore->hasSchema('some-other-schema')->willReturn(true);
        $schemaStore->getSchema('some-other-schema')->willReturn($someSchema);

        $componentLocator = new ComponentLocator($schemaStore->reveal());
        $this->assertSame(
            $componentLocator->getComponentClassFromTag($themeDefinition, 'some-other-schema'),
            'My/Component/Implementation'
        );

    }

    /** @test */
    public function it_throws_an_exception_if_the_component_was_not_found(){
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage(
            'Could not find the component [some-another-schema]'
        );

        $themeDefinition = new ComponentLocatorTestDummyThemeDefinition();
        $someSchema = new ComponentLocatorTestDummySchemaDefinition();

        $schemaStore = $this->prophesize(SchemaStore::class);
        $schemaStore->hasSchema('some-another-schema')->willReturn(false);

        $componentLocator = new ComponentLocator($schemaStore->reveal());
        $componentLocator->getComponentClassFromTag($themeDefinition, 'some-another-schema');

    }

    /** @test */
    public function getImplementationClassFromSchema_returns_the_given_class_name_if_its_instantiable(){
        ComponentLocatorTestDummySchemaDefinition::$defaultImplementation = null;

        $componentLocator = new ComponentLocator($this->prophesize(SchemaStore::class)->reveal());
        $class = $componentLocator->getImplementationClassFromSchema(ComponentLocatorTestDummySchemaDefinition::class);

        $this->assertEquals(ComponentLocatorTestDummySchemaDefinition::class, $class);
    }

    /** @test */
    public function getImplementationClassFromSchema_returns_the_defaultImplementation_if_method_exists(){
        ComponentLocatorTestDummySchemaDefinitionAbstract::$defaultImplementation = 'SomeOtherImplementation';

        $componentLocator = new ComponentLocator($this->prophesize(SchemaStore::class)->reveal());
        $class = $componentLocator->getImplementationClassFromSchema( ComponentLocatorTestDummySchemaDefinitionAbstract::class);

        $this->assertEquals('SomeOtherImplementation', $class);
    }

    /** @test */
    public function getImplementationClassFromSchema_throws_an_exception_if_the_class_does_not_exist(){
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Class ThisIsNotAClass could not be instantiated');

        $componentLocator = new ComponentLocator($this->prophesize(SchemaStore::class)->reveal());
        $componentLocator->getImplementationClassFromSchema('ThisIsNotAClass');

    }

    /** @test */
    public function getImplementationClassFromSchema_throws_an_exception_if_the_class_is_not_a_schema(){
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Class Twigger\Tests\Blade\Unit\Foundation\SomeClass could not be instantiated');

        $componentLocator = new ComponentLocator($this->prophesize(SchemaStore::class)->reveal());
        $componentLocator->getImplementationClassFromSchema(SomeClass::class);
    }


}

class ComponentLocatorTestDummyThemeDefinition extends ThemeDefinition
{

    /**
     * @var string
     */
    private $someSchemaReturns;

    public function name(): string
    {
        return 'some-test-dummy';
    }

    public function someSchema()
    {
        return $this->someSchemaReturns;
    }

    public function someSchemaReturns(string $getClass)
    {
        $this->someSchemaReturns = $getClass;
    }
}

class ComponentLocatorTestDummySchemaDefinition extends SchemaDefinition
{
    public static $defaultImplementation;

    public function tag(): string
    {
        return 'some-abstract-schema';
    }

    public static function defaultImplementation(): string
    {
        return static::$defaultImplementation;
    }

    public function render()
    {
    }
}



abstract class ComponentLocatorTestDummySchemaDefinitionAbstract extends SchemaDefinition
{
    public static $defaultImplementation;

    public function tag(): string
    {
        return 'some-abstract-schema';
    }

    public static function defaultImplementation(): string
    {
        return static::$defaultImplementation;
    }

}

class SomeClass {

}
