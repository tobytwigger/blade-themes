<?php

namespace Twigger\Tests\Blade\Integration\Foundation;

use Twigger\Blade\Foundation\ScriptStore;
use Twigger\Tests\Blade\LaravelTestCase;

class ScriptStoreTest extends LaravelTestCase
{

    /** @test */
    public function the_store_is_a_singleton(){
        app()->make(ScriptStore::class)->registerScript('s1');
        app()->make(ScriptStore::class)->registerScript('s2');

        $this->assertSame([
            's1', 's2',
        ], app()->make(ScriptStore::class)->allScripts());
    }

}
