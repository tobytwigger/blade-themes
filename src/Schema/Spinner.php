<?php

namespace Twigger\Blade\Schema;

use Twigger\Blade\Docs\DocAllowedValue;
use Twigger\Blade\Docs\DocDescription;
use Twigger\Blade\Docs\DocName;
use Twigger\Blade\Foundation\SchemaDefinition;
use Twigger\Blade\Themes\Bootstrap\Components\Spinner as BootstrapSpinner;

/**
 * @DocName(name="Spinner")
 * @DocDescription(description="A spinner used for loading or showing circular progress")
 */
abstract class Spinner extends SchemaDefinition
{

    /**
     * @DocDescription(description="The text to show to screen readers")
     * @var string
     */
    public $alt;

    /**
     * @DocDescription(description="The variant of the spinner")
     * @DocAllowedValue(value="success", description="Successssful Spinner", tips={"Use in xyz1", "Use in abc1"})
     * @DocAllowedValue(value="danger", description="Danger Spinner", tips={"Use in xyz2", "Use in abc2"})
     * @DocAllowedValue(value="info", description="Info Spinner", tips={"Use in xyz3", "Use in abc3"})
     * @DocAllowedValue(value="primary", description="Primary Spinner", tips={"Use in xyz3", "Use in abc3"})
     * @DocAllowedValue(value="secondary", description="Secondary Spinner", tips={"Use in xyz3", "Use in abc3"})
     * @DocAllowedValue(value="warning", description="Warning Spinner", tips={"Use in xyz3", "Use in abc3"})
     * @var string
     */
    public $variant;

    /**
     * @DocDescription(description="The size of the spinner")
     * @DocAllowedValue(value="lg", description="A large spinner")
     * @DocAllowedValue(value="sm", description="A small spinner")
     * @DocAllowedValue(value="", description="A normal size spinner")
     * @var string|null
     */
    public $size;

    public function __construct(string $alt = 'Loading', string $variant = 'primary', string $size = null)
    {
        $this->alt = $alt;
        $this->variant = $variant;
        $this->size = $size;
    }

    public static function tag(): string
    {
        return 'spinner';
    }

    public static function defaultImplementation(): string
    {
        return BootstrapSpinner::class;
    }

}
