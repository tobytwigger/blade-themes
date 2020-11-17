<?php

namespace Twigger\Blade\Docs;

/**
 * @Annotation
 */
final class DocExample implements BaseAnnotation
{

    public $name;
    public $description;
    public $tips;
    public $attributeValues;
    public $slots;

    public function getSlots()
    {
        if($this->slots === 'NO_KEY') {
            return DocSlot::NO_KEY;
        }
        if($this->slots === null) {
            return [];
        }
        foreach($this->slots as $key => $slot) {
            if($key === 'NO_KEY') {
                $this->slots[DocSlot::NO_KEY] = $slot;
                unset($this->slots[$key]);
            }
        }
        return $this->slots;
    }

    public function isValid(): bool
    {
        return true;
    }

}
