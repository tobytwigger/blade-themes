<?php

namespace Twigger\Blade\Docs;

/**
 * @Annotation
 */
final class DocDescription implements BaseAnnotation
{

    public $description;

    public function isValid(): bool
    {
        return $this->description !== null && is_string($this->description);
    }
}
