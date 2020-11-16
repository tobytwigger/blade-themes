<?php

namespace Twigger\Blade\Schema;

use Twigger\Blade\Docs\DocDescription;
use Twigger\Blade\Docs\DocName;
use Twigger\Blade\Foundation\SchemaDefinition;
use Twigger\Blade\Themes\Material\Components\Select as MaterialSelect;

/**
 * @DocName(name="Select")
 * @DocDescription(description="A dropdown list")
 */
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
        $this->items = (is_string($items) ? json_decode($items, true) : $items);
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
