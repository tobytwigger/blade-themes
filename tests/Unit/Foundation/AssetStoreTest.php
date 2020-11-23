<?php

namespace Twigger\Tests\Blade\Unit\Foundation;

use Twigger\Blade\Foundation\AssetStore;
use Twigger\Tests\Blade\TestCase;

class AssetStoreTest extends TestCase
{

    /** @test */
    public function it_registers_and_returns_all_scripts(){
        $scriptStore = new AssetStore();
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
    public function it_doesnt_register_duplicate_scripts(){
        $scriptStore = new AssetStore();
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

    /** @test */
    public function it_registers_and_returns_all_styles(){
        $styleStore = new AssetStore();
        $styleStore->registerStyle('sone');
        $styleStore->registerStyle('stwo');
        $styleStore->registerStyle('sthree');

        $allStyles = $styleStore->allStyles();

        $this->assertEquals([
            'sone',
            'stwo',
            'sthree'
        ], $allStyles);
    }

    /** @test */
    public function it_doesnt_register_duplicate_styles(){
        $styleStore = new AssetStore();
        $styleStore->registerStyle('sone');
        $styleStore->registerStyle('stwo');
        $styleStore->registerStyle('stwo');

        $allStyles = $styleStore->allStyles();

        $this->assertCount(2, $allStyles);
        $this->assertEquals([
            'sone',
            'stwo'
        ], $allStyles);
    }
}
