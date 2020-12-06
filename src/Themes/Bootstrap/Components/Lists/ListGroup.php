<?php

namespace Twigger\Blade\Themes\Bootstrap\Components\Lists;

class ListGroup extends \Twigger\Blade\Schema\Lists\ListGroup
{
    public function render()
    {
        return view('bootstrap-theme::lists.list-group');
    }
}
