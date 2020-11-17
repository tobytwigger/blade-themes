<?php

namespace Twigger\Blade\Docs;

use Doctrine\Common\Annotations\Annotation;

/**
 * @Annotation
 */
final class DocTip implements BaseAnnotation
{

    public $tip;

    public function isValid(): bool
    {
        return $this->tip !== null && is_string($this->tip);
    }

}
