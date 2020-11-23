<?php

namespace Twigger\Tests\Blade\Integration\Foundation\ThemeServiceProvider;

use Twigger\Blade\Foundation\SchemaDefinition;
use Twigger\Blade\Foundation\SchemaStore;
use Twigger\Tests\Blade\LaravelTestCase;

class ItThrowsAnExceptionIfTheSchemaClassCouldNotBeLoadedTest extends LaravelTestCase
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
     * @var string
     */
    private $exceptionMessage;

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
            'SomeClassThatCantBeLoaded',
        ]);
        $this->setConfig = false;

    }

    public function setUp(): void
    {
        try {
            parent::setUp();
        } catch (\Exception $e) {
            $this->exceptionMessage = $e->getMessage();
        }
    }

    /** @test */
    public function test()
    {
        $this->assertEquals(
            'A schema class could not be found for schema SomeClassThatCantBeLoaded',
            $this->exceptionMessage
        );
    }

}
