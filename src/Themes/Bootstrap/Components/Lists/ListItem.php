<?php

namespace Twigger\Blade\Themes\Bootstrap\Components\Lists;

class ListItem extends \Twigger\Blade\Schema\Lists\ListItem
{
    public function render()
    {
        return view('bootstrap-theme::lists.list-item');
    }

    public function classes()
    {
        $classes = ['list-group-item'];
        if($this->active === true) {
            $classes[] = 'active';
        }
        if($this->disabled === true) {
            $classes[] = 'disabled';
        }
        if($this->variant) {
            $classes[] = 'list-group-item-' . $this->variant;
        }
        return implode(' ', $classes);
    }
}
