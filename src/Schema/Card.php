<?php

namespace Twigger\Blade\Schema;

use Twigger\Blade\Foundation\SchemaDefinition;

abstract class Card extends SchemaDefinition
{

    /**
     * @var string|null
     */
    public $imageSrc;
    /**
     * @var string|null
     */
    public $imageAlt;
    /**
     * @var string|null
     */
    public $title;
    /**
     * @var string|null
     */
    public $subtitle;

    public function __construct(string $imageSrc = null, string $imageAlt = null, string $title = null, string $subtitle = null)
    {
        $this->imageSrc = $imageSrc;
        $this->imageAlt = $imageAlt;
        $this->title = $title;
        $this->subtitle = $subtitle;
    }

    public static function tag(): string
    {
        return 'card';
    }

    public static function defaultImplementation(): string
    {
        return \Twigger\Blade\Themes\Bootstrap\Components\Card::class;
    }
}
