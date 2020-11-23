<?php

namespace Twigger\Blade\Themes\Bootstrap\Components\Card;

class Card extends \Twigger\Blade\Schema\Card
{

    public function render()
    {
        return view('bootstrap-theme::card.card');
    }
}
