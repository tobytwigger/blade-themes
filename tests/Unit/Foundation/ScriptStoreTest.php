<?php

namespace Twigger\Tests\Blade\Unit\Foundation;

use Twigger\Blade\Foundation\ScriptStore;
use Twigger\Tests\Blade\TestCase;

class ScriptStoreTest extends TestCase
{

    /** @test */
    public function it_registers_and_returns_all_scripts(){
        $scriptStore = new ScriptStore();
        $scriptStore->registerScript('one');
        $scriptStore->registerScript('two');
        $scriptStore->registerScript('three');

        $allScripts = $scriptStore->allScripts();

        $this->assertEquals([
            'one',
            'two',
            'three'
        ], $allScripts);
    }

    /** @test */
    public function it_doesnt_register_duplicates(){
        $scriptStore = new ScriptStore();
        $scriptStore->registerScript('one');
        $scriptStore->registerScript('two');
        $scriptStore->registerScript('two');

        $allScripts = $scriptStore->allScripts();

        $this->assertCount(2, $allScripts);
        $this->assertEquals([
            'one',
            'two'
        ], $allScripts);
    }
}
