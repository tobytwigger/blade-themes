<?php

namespace Twigger\Blade\Schema;

use Twigger\Blade\Docs\DocAllowedValue;
use Twigger\Blade\Docs\DocDescription;
use Twigger\Blade\Docs\DocName;
use Twigger\Blade\Docs\DocSlot;
use Twigger\Blade\Docs\DocTip;
use Twigger\Blade\Foundation\SchemaDefinition;
use Twigger\Blade\Themes\Material\Components\Button as MaterialButton;

/**
 * @DocName(name="Button")
 * @DocDescription(description="A simple button")
 * @DocSlot(name="Content", description="Button Content")
 * @DocTip(tip="Buttons can be used to execute actions")
 * @DocTip(tip="Another tip here")
 */
abstract class Button extends SchemaDefinition
{

    /**
     * @DocName(name="Type")
     * @DocDescription(description="The type of button to create.")
     * @DocAllowedValue(value="success", description="Successfuls Button", tips={"Use in xyz1", "Use in abc1"})
     * @DocAllowedValue(value="danger", description="Danger Button", tips={"Use in xyz2", "Use in abc2"})
     * @DocAllowedValue(value="info", description="Info Button", tips={"Use in xyz3", "Use in abc3"})
     * @var string
     */
    public $type;

    public function __construct(string $type)
    {
        $this->type = $type;
    }

    public static function tag(): string
    {
        return 'button';
    }

    public static function defaultImplementation(): string
    {
        return MaterialButton::class;
    }

}
