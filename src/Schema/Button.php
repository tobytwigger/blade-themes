<?php

namespace Twigger\Blade\Schema;

use Twigger\Blade\Docs\DocAllowedValue;
use Twigger\Blade\Docs\DocDescription;
use Twigger\Blade\Docs\DocName;
use Twigger\Blade\Docs\DocSlot;
use Twigger\Blade\Docs\DocTip;
use Twigger\Blade\Foundation\SchemaDefinition;
use Twigger\Blade\Themes\Bootstrap\Components\Button as BootstrapButton;

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
     * @DocName(name="Variant")
     * @DocDescription(description="The type ofss button to create.")
     * @DocAllowedValue(value="success", description="Successssful Button", tips={"Use in xyz1", "Use in abc1"})
     * @DocAllowedValue(value="danger", description="Danger Button", tips={"Use in xyz2", "Use in abc2"})
     * @DocAllowedValue(value="info", description="Info Button", tips={"Use in xyz3", "Use in abc3"})
     * @DocAllowedValue(value="warning", description="Warning Button", tips={"Use in xyz3", "Use in abc3"})
     * @var string
     */
    public $variant;

    /**
     * @DocDescription(description="Whether the background should be filled in or not")
     * @var bool
     */
    public $backgroundFill;

    /**
     * @DocDescription(description="The size of the button")
     * @DocAllowedValue(value="lg", description="A large button")
     * @DocAllowedValue(value="sm", description="A small button")
     * @DocAllowedValue(value="", description="A normal size button")
     * @var string|null
     */
    public $size;

    /**
     * @DocDescription(description="Should the button be a block button?")
     * @var bool
     */
    public $block;

    /**
     * @DocDescription(description="Should the button be disabled?")
     * @var bool
     */
    public $disabled;

    public function __construct(string $variant = 'primary', bool $backgroundFill = true, string $size = null, bool $block = false, bool $disabled = false)
    {
        $this->variant = $variant;
        $this->backgroundFill = $backgroundFill;
        $this->size = $size;
        $this->block = $block;
        $this->disabled = $disabled;
    }

    public static function tag(): string
    {
        return 'button';
    }

    public static function defaultImplementation(): string
    {
        return BootstrapButton::class;
    }

}
