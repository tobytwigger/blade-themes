<?php

namespace Twigger\Blade\Themes\Material\Components;

use Twigger\Blade\Foundation\ScriptStore;
use Twigger\Blade\Schema\Select as SelectSchema;

class Select extends SelectSchema
{

    public function render()
    {
        return view('material-theme::select');
    }
}
