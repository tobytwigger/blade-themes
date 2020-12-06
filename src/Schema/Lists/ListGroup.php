<?php

namespace Twigger\Blade\Schema\Lists;

use Twigger\Blade\Foundation\SchemaDefinition;

abstract class ListGroup extends SchemaDefinition
{

    /**
     * @var bool
     */
    public $bordered;
    /**
     * @var bool
     */
    public $horizontal;

    public function __construct(bool $bordered = true,
                                bool $horizontal = false)
    {
        $this->bordered = $bordered;
        $this->horizontal = $horizontal;
    }

    public static function tag(): string
    {
        return 'list-group';
    }

    public static function defaultImplementation(): string
    {
        return \Twigger\Blade\Themes\Bootstrap\Components\Lists\ListGroup::class;
    }
}
