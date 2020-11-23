<?php

namespace Twigger\Blade\Themes\Materialize\Components\Card;

class Card extends \Twigger\Blade\Schema\Card
{

    public function render()
    {
        return view('materialize-theme::card.card');
    }
}
