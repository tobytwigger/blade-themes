<?php


namespace Twigger\Blade\Schema;


use Twigger\Blade\Docs\DocDescription;

abstract class Checkbox extends FormInput
{

    /**
     * @DocDescription(description="The value given to the server if the checkox is selected.")
     * @var mixed
     */
    public $value;

    /**
     * @DocDescription(description="Whether the checkbox is initially selected")
     * @var bool
     */
    public $checked;

    public function __construct(string $id,
                                string $name,
                                string $label = null,
                                string $srLabel = null,
                                string $help = null,
                                array $errors = [],
                                bool $validated = false,
                                $value = null,
                                bool $required = false,
                                bool $disabled = false,
                                bool $checked = false)
    {
        parent::__construct($id, $name, $label, $srLabel, $help, $errors, $validated, $value, $required, $disabled);
        $this->checked = $checked;
    }

    public static function tag(): string
    {
        return 'checkbox';
    }

    public static function defaultImplementation(): string
    {
        return \Twigger\Blade\Themes\Bootstrap\Components\Checkbox::class;
    }
}
