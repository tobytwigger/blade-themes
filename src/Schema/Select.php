<?php

namespace Twigger\Blade\Schema;

use Twigger\Blade\Foundation\SchemaDefinition;
use Twigger\Blade\Themes\Material\Components\Select as MaterialSelect;

abstract class Select extends SchemaDefinition
{

    /**
     * A list of items to show in the dropdown
     *
     * Each element should have a label and a value.
     *
     * @var array
     */
    public $items;

    public function __construct($items)
    {
        $this->items = $items;
    }

    public static function tag(): string
    {
        return 'select';
    }

    public static function defaultImplementation(): string
    {
        return MaterialSelect::class;
    }

}
