<?php

namespace Twigger\Tests\Blade\Integration\Foundation;

use Twigger\Blade\Foundation\AssetStore;
use Twigger\Tests\Blade\LaravelTestCase;

class AssetStoreTest extends LaravelTestCase
{

    /** @test */
    public function the_store_is_a_singleton(){
        app()->make(AssetStore::class)->registerScript('s1');
        app()->make(AssetStore::class)->registerScript('s2');

        $this->assertSame([
            's1', 's2',
        ], app()->make(AssetStore::class)->allScripts());
    }

}
