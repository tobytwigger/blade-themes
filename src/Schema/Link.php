<?php

namespace Twigger\Blade\Schema;

use Twigger\Blade\Docs\DocAllowedValue;
use Twigger\Blade\Docs\DocDescription;
use Twigger\Blade\Foundation\SchemaDefinition;

abstract class Link extends SchemaDefinition
{

    /**
     * @DocDescription(description="The URL to link to")
     * @var string
     */
    public $href;

    /**
     * @DocAllowedValue(description="Opens the linked document in a new window or tab", value="_blank")
     * @DocAllowedValue(description="Opens the linked document in the same frame as it was clicked", value="_self", tips={"This is the default"})
     * @DocAllowedValue(description="Opens the linked document in the parent frame", value="_parent")
     * @DocAllowedValue(description="Opens the linked document in the full body of the window", value="_top")
     * @var string
     */
    public $target;

    public function __construct(string $href, string $target = '_self')
    {
        $this->href = $href;
        $this->target = $target;
    }

    public static function tag(): string
    {
        return 'link';
    }

    public static function defaultImplementation(): string
    {
        return \Twigger\Blade\Themes\Bootstrap\Components\Link::class;
    }
}
