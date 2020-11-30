<?php

namespace Twigger\Blade\Schema;

use Twigger\Blade\Docs\DocAllowedValue;
use Twigger\Blade\Docs\DocDescription;
use Twigger\Blade\Foundation\SchemaDefinition;
use Twigger\Blade\Themes\Bootstrap\Components\Alert as BootstrapAlert;

abstract class Alert extends SchemaDefinition
{

    /**
     * @DocDescription(description="The variant of alert")
     * @DocAllowedValue(value="success", description="Successssful Alert", tips={"Use in xyz1", "Use in abc1"})
     * @DocAllowedValue(value="danger", description="Danger Alert", tips={"Use in xyz2", "Use in abc2"})
     * @DocAllowedValue(value="info", description="Info Alert", tips={"Use in xyz3", "Use in abc3"})
     * @DocAllowedValue(value="warning", description="Warning Alert", tips={"Use in xyz3", "Use in abc3"})
     * @var string
     */
    public $variant;

    /**
     * @DocDescription(description="Whether the alert is dismissible")
     * @var bool
     */
    public $dismissible;

    public function __construct(string $variant = 'primary', bool $dismissible = false)
    {
        $this->variant = $variant;
        $this->dismissible = $dismissible;
    }

    public static function tag(): string
    {
        return 'alert';
    }

    public static function defaultImplementation(): string
    {
        return BootstrapAlert::class;
    }

    public function variantAlt()
    {
        switch($this->variant) {
            case 'info':
                return 'An informational alert';
                break;
            case 'danger':
                return 'Error';
                break;
            case 'warning':
                return 'Warning';
                break;
            case 'success':
                return 'Success';
                break;
        }
        return 'Alert';
    }

}
