<?php

namespace Twigger\Blade\Schema;

use Twigger\Blade\Docs\DocAllowedValue;
use Twigger\Blade\Docs\DocDescription;
use Twigger\Blade\Docs\DocExample;
use Twigger\Blade\Docs\DocName;
use Twigger\Blade\Docs\DocTip;
use Twigger\Blade\Themes\Bootstrap\Components\Select as BootstrapSelect;

/**
 * @DocName(name="Select")
 * @DocDescription(description="A dropdown list")
 * @DocTip(tip="Selects can be used as alternatives to radio buttons")
 * @DocExample(name="Example Options", description="Some select options",
 *     tips={"Useful for abc", "Can add and remove options"},
 *     attributeValues={"items": {{"label": "First Option", "value": "1"}, {"label": "Second Option", "value": "2"}, {"label": "Third Option", "value": "3"}}}
 * )
 */
abstract class Select extends FormInput
{

    /**
     * @var array
     * @DocName(name="Items")
     * @DocDescription(description="A list of items to show in the dropdown")
     * @DocAllowedValue(
     *     value="[['label' => 'Item 1', 'value' => '1'], ['label' => 'Item 2', 'value' => '2']]",
     *      description="A dropdown with two options",
     *      tips={"This is a useful tip", "As is this!"}
     * )
     */
    public $items;

    public function __construct(array $items, string $id, string $name, string $label = null, string $srLabel = null, string $help = null, array $errors = [], bool $validated = false)
    {
        $this->items = (is_string($items) ? json_decode($items, true) : $items);
        parent::__construct($id, $name, $label, $srLabel, $help, $errors, $validated);
    }

    public static function tag(): string
    {
        return 'select';
    }

    public static function defaultImplementation(): string
    {
        return BootstrapSelect::class;
    }

}
