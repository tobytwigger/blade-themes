<?php

namespace Twigger\Blade\Foundation;

class ComponentDefinition
{

    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $class;

    public function __construct(string $name, string $class)
    {
        $this->name = $name;
        $this->class = $class;
    }

    public static function define(string $name, string $class)
    {
        return new static($name, $class);
    }

}
