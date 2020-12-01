<?php

namespace Twigger\Blade\Schema;

use Illuminate\Support\ViewErrorBag;
use Twigger\Blade\Docs\DocDescription;
use Twigger\Blade\Foundation\SchemaDefinition;

abstract class ErrorSummary extends SchemaDefinition
{

    /**
     * @DocDescription(description="The error bag given to blade")
     * @var ViewErrorBag
     */
    public $errors;

    /**
     * @DocDescription(description="The bag to use. Defaults to 'default'")
     * @var string
     */
    public $bag;

    /**
     * @DocDescription(description="The text to show in the error summary")
     * @var string
     */
    public $header;

    public function __construct(ViewErrorBag $errors, string $bag = 'default', string $header = 'Please fix the following errors')
    {
        $this->errors = $errors;
        $this->bag = $bag;
        $this->header = $header;
    }

    public static function tag(): string
    {
        return 'error-summary';
    }

    public static function defaultImplementation(): string
    {
        return \Twigger\Blade\Themes\Bootstrap\Components\ErrorSummary::class;
    }

    public function errorsAsArray()
    {
        return $this->errors->getBag($this->bag)->toArray();
    }
}
