<?php

namespace Twigger\Tests\Blade;

use Prophecy\PhpUnit\ProphecyTrait;
use Twigger\Blade\ThemeServiceProvider;

class LaravelTestCase extends \Orchestra\Testbench\TestCase
{
    use ProphecyTrait;

    protected $setConfig = true;

    protected function getPackageProviders($app)
    {
        return [
            ThemeServiceProvider::class
        ];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'test');
        if($this->setConfig) {
            $app['config']->set('themes.components', []);
            $app['config']->set('themes.theme', null);
        }
        $app['config']->set('database.connections.test', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);
    }

}
