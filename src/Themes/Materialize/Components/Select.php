<?php

namespace Twigger\Blade\Themes\Materialize\Components;

use Twigger\Blade\Foundation\AssetStore;
use Twigger\Blade\Schema\Select as SelectSchema;

class Select extends SelectSchema
{

    public function render()
    {
        return view('materialize-theme::select');
    }
}
