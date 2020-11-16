<?php

namespace Twigger\Blade\Schema;

use Twigger\Blade\Docs\DocDescription;
use Twigger\Blade\Docs\DocName;
use Twigger\Blade\Foundation\SchemaDefinition;
use Twigger\Blade\Themes\Material\Components\Button as MaterialButton;

/**
 * @DocName(name="Button")
 * @DocDescription(description="A simple button")
 */
abstract class Button extends SchemaDefinition
{

    /**
     * @DocName(name="Type")
     * @DocDescription(description="The type of button to create.")
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
