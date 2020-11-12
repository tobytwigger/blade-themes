<?php

namespace Twigger\Blade;

use Illuminate\Support\Facades\Facade;
use Twigger\Blade\Foundation\ThemeStore;

class Theme extends Facade
{

    protected static function getFacadeAccessor()
    {
        return ThemeStore::class;
    }

}
