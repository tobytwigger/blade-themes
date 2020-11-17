<?php

namespace Twigger\Blade\Docs;

use Doctrine\Common\Annotations\Annotation;

/**
 * @Annotation
 */
final class DocSlot implements BaseAnnotation
{

    const NO_KEY = 'no_key';

    public $name;

    public $key;

    public $description;

    public function isValid(): bool
    {
        return $this->name !== null && is_string($this->name);
    }

}
