<?php

namespace Twigger\Blade\Schema;

use Twigger\Blade\Docs\DocAllowedValue;
use Twigger\Blade\Docs\DocDescription;
use Twigger\Blade\Docs\DocExample;
use Twigger\Blade\Docs\DocName;
use Twigger\Blade\Docs\DocTip;
use Twigger\Blade\Foundation\SchemaDefinition;
use Twigger\Blade\Themes\Material\Components\Select as MaterialSelect;

/**
 * @DocName(name="Select")
 * @DocDescription(description="A dropdown list")
 * @DocTip(tip="Selects can be used as alternatives to radio buttons")
 * @DocExample(name="Example Options", description="Some select options",
 *     tips={"Useful for abc", "Can add and remove options"},
 *     attributeValues={"items": {{"label": "First Option", "value": "1"}, {"label": "Second Option", "value": "2"}, {"label": "Third Option", "value": "3"}}}
 * )
 */
abstract class Select extends SchemaDefinition
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

    /**
     * @var string
     * @DocName(name="Component ID")
     * @DocDescription(description="The ID to be used on the base component")
     * @DocAllowedValue(value="some-id", tips={"This can be anything you want"}, description="The ID of the select element will be 'some-id'")
     * @DocAllowedValue(value="null", tips={"You can also just leave the id attribute off the component"}, description="The select element will not have an ID attribute if id is blank")
     */
    public $id;

    /**
     * @var string
     * @DocName(name="Component name")
     * @DocDescription(description="The name to be used on the base component")
     * @DocAllowedValue(value="some-name", tips={"This can be anything you want"}, description="The name of the select element will be 'some-name'")
     * @DocAllowedValue(value="null", tips={"You can also just leave the name attribute off the component"}, description="The select element will not have an name attribute if name is blank")
     */
    public $name;

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
