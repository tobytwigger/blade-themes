<?php

namespace Twigger\Blade\Docs;

use Doctrine\Common\Annotations\Annotation;

/**
 * @Annotation
 */
final class DocName implements BaseAnnotation
{

    public $name;

    public function isValid(): bool
    {
        return $this->name !== null && is_string($this->name);
    }

}
