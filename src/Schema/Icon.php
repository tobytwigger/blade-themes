<?php

namespace Twigger\Blade\Schema;

use Twigger\Blade\Foundation\SchemaDefinition;

abstract class Icon extends SchemaDefinition
{

    /**
     * @var string
     */
    public $icon;

    public function __construct(string $icon)
    {
        $this->icon = $icon;
    }

    public static function tag(): string
    {
        return 'icon';
    }

    public static function defaultImplementation(): string
    {
        return \Twigger\Blade\Themes\Bootstrap\Components\Icon::class;
    }
}
