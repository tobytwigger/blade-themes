<?php

namespace Twigger\Blade\Schema;

use Twigger\Blade\Docs\DocAllowedValue;
use Twigger\Blade\Docs\DocDescription;
use Twigger\Blade\Docs\DocName;
use Twigger\Blade\Foundation\SchemaDefinition;
use Twigger\Blade\Themes\Material\Components\Button as MaterialButton;

/**
 * @DocName(name="Card")
 * @DocDescription(description="A card")
 */
abstract class Card extends SchemaDefinition
{

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
