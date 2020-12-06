<?php

namespace Twigger\Blade\Schema\Lists;

use Twigger\Blade\Foundation\SchemaDefinition;

abstract class ListItem extends SchemaDefinition
{

    /**
     * @var bool
     */
    public $active;

    /**
     * @var bool
     */
    public $disabled;

    /**
     * @var string|null
     */
    public $href;

    /**
     * @var string|null
     */
    public $variant;

    public function __construct(bool $active = false,
                                bool $disabled = false,
                                string $href = null,
                                string $variant = null)
    {
        $this->active = $active;
        $this->disabled = $disabled;
        $this->href = $href;
        $this->variant = $variant;
    }

    public static function tag(): string
    {
        return 'list-item';
    }

    public static function defaultImplementation(): string
    {
        return \Twigger\Blade\Themes\Bootstrap\Components\Lists\ListItem::class;
    }
}
