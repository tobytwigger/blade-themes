<?php

namespace Twigger\Blade\Schema;

use Twigger\Blade\Foundation\SchemaDefinition;
use Twigger\Blade\Themes\Material\Components\Button as MaterialButton;

/**
 * Button
 *
 * A button can be used as a form of UI with the user. xyzabc
 * 
 */
abstract class Button extends SchemaDefinition
{

    /**
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
