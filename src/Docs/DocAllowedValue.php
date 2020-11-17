<?php

namespace Twigger\Blade\Docs;

use Doctrine\Common\Annotations\Annotation;

/**
 * @Annotation
 */
final class DocAllowedValue implements BaseAnnotation
{

    public $value;

    public $description;

    public $tips;

    public function isValid(): bool
    {
        return $this->value !== null && is_string($this->value);
    }

}
