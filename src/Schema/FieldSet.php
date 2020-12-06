<?php

namespace Twigger\Blade\Schema;

use Twigger\Blade\Foundation\SchemaDefinition;

abstract class FieldSet extends SchemaDefinition
{

    /**
     * @var bool
     */
    public $disabled;
    /**
     * @var string
     */
    public $legend;

    public function __construct(string $legend, bool $disabled = false)
    {
        $this->disabled = $disabled;
        $this->legend = $legend;
    }

    public static function tag(): string
    {
        return 'fieldset';
    }

    public static function defaultImplementation(): string
    {
        return \Twigger\Blade\Themes\Bootstrap\Components\FieldSet::class;
    }
}
