<?php

namespace Twigger\Blade\Schema;

use Twigger\Blade\Docs\DocDescription;
use Twigger\Blade\Docs\DocTip;
use Twigger\Blade\Foundation\SchemaDefinition;

abstract class FormInput extends SchemaDefinition
{

    /**
     * @DocDescription(description="The label users are able to see next to the control")
     * @var string|null
     */
    public $label;

    /**
     * @DocDescription(description="Text below the control to help the user work out what to put for the input")
     * @var string|null
     */
    public $help;

    /**
     * @DocDescription(description="An array of errors")
     * @var array
     */
    public $errors;

    /**
     * @DocDescription(description="The ID of the form element")
     * @var string
     */
    public $id;

    /**
     * @DocDescription(description="The name of the form element")
     * @var string
     */
    public $name;

    /**
     * @DocDescription(description="A consise description of the form control. This is used for screenreaders, so should explain exactly what the control is for.")
     * @var string|null
     */
    public $srLabel;

    /**
     * @DocDescription(description="Has the form control been validated?")
     * @DocTip(tip="If set to true, a field without errors will be shown as valid")
     * @var bool
     */
    public $validated;

    /**
     * @DocDescription(description="The default value of the input.")
     * @var mixed
     */
    public $value;

    /**
     * @DocDescription(description="Marks the element as disabled")
     * @var bool
     */
    public $required;

    /**
     * @DocDescription(description="Marks the element as disabled")
     * @var bool
     */
    public $disabled;

    public function __construct(string $id,
                                string $name,
                                string $label = null,
                                string $srLabel = null,
                                string $help = null,
                                array $errors = [],
                                bool $validated = false,
                                $value = null,
                                bool $required = false,
                                bool $disabled = false)
    {
        $this->label = $label;
        $this->help = $help;
        $this->errors = $errors;
        $this->id = $id;
        $this->name = $name;
        $this->srLabel = $srLabel;
        $this->validated = $validated;
        $this->value = $value;
        $this->required = $required;
        $this->disabled = $disabled;
    }

    public function isValid(): bool
    {
        return count($this->errors) === 0;
    }

}
