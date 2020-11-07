<?php

namespace Twigger\Blade\Foundation;

use Illuminate\Support\Facades\Facade;

class Theme extends Facade
{

    protected static function getFacadeAccessor()
    {
        return ThemeStore::class;
    }

}
