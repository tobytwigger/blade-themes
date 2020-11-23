<?php

namespace Twigger\Blade\Foundation;

use Illuminate\Support\Str;
use Illuminate\View\Component;

abstract class SchemaDefinition extends Component
{

    public function __construct()
    {
    }

    public function data()
    {
        $data = parent::data();
        $this->mapAttributes();
        return $data;
    }

    private function mapAttributes()
    {
        foreach($this->attributes->getAttributes() as $key => $attribute) {
            if(property_exists($this, $key) && empty($this->{$key})) {
                $this->{$key} = $attribute;
            }
        }
    }

    abstract public static function tag(): string;

    abstract public static function defaultImplementation(): string;

}
