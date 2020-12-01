<?php

namespace Twigger\Blade\Schema;

use Twigger\Blade\Docs\DocAllowedValue;
use Twigger\Blade\Docs\DocDescription;
use Twigger\Blade\Foundation\SchemaDefinition;
use Twigger\Blade\Themes\Bootstrap\Components\Toggle as BootstrapToggle;

abstract class Toggle extends SchemaDefinition
{

    /**
     * @DocDescription(description="The ID for the input element")
     * @var string
     */
    public $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public static function tag(): string
    {
        return 'toggle';
    }

    public static function defaultImplementation(): string
    {
        return BootstrapToggle::class;
    }

}
