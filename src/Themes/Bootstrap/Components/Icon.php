<?php

namespace Twigger\Blade\Themes\Bootstrap\Components;

use Twigger\Blade\Schema\Concerns\InjectsIconData;

class Icon extends \Twigger\Blade\Schema\Icon
{
    use InjectsIconData;

    public function render()
    {
        return view('bootstrap-theme::icon');
    }

    public function iconMap(): array
    {
        return [
            'user' => 'user',
            'password' => 'key',
            'lock' => 'lock',
            'lock-open' => 'lock-open'
        ];
    }

    static protected function iconSetName(): string
    {
        return 'fontawesome';
    }

    protected function iconName(): string
    {
        return $this->icon;
    }

    protected function defaultIconData()
    {
        return 'question-circle';
    }
}
