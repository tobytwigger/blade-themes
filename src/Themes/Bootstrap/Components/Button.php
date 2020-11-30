<?php

namespace Twigger\Blade\Themes\Bootstrap\Components;

use Twigger\Blade\Docs\DocAllowedValue;
use Twigger\Blade\Docs\DocDescription;
use Twigger\Blade\Docs\DocExample;
use Twigger\Blade\Docs\DocName;
use Twigger\Blade\Docs\DocTip;
use Twigger\Blade\Schema\Button as ButtonSchema;

/**
 * @DocTip(tip="This is a bootstrap specific tip")
 * @DocExample(name="Successful Button", description="A successful button example",
 *     tips={"Useful for abc", "Can also use other types"},
 *     attributeValues={"type": "success"},
 *     slots={"NO_KEY": "<strong>Button</strong> Content"}
 * )
 */
class Button extends ButtonSchema
{

    public function render()
    {
        return view('bootstrap-theme::button');
    }

    public function classes()
    {
        $classes = ['btn'];
        $classes[] = 'btn-' . ($this->backgroundFill === false ? 'outline-' : '') . $this->variant;
        if($this->size !== null) {
            $classes[] = 'btn-' . $this->size;
        }
        if($this->block === true) {
            $classes[] = 'btn-block';
        }
        return implode(' ', $classes);
    }
}
