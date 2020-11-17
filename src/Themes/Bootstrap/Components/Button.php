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

    /**
     * @DocName(name="Tqwype")
     * @DocDescription(description="The type ofss button to create.")
     * @DocAllowedValue(value="success", description="Successssful Button", tips={"Use in xyz1", "Use in abc1"})
     * @DocAllowedValue(value="info", description="Info Butaaaton", tips={"Use in xyz3", "Use in abc3"})
     * @var string
     */
    public $type;

    public function render()
    {
        return view('bootstrap-theme::button');
    }
}
