<?php

namespace Twigger\Blade\Foundation;

abstract class ThemeDefinition
{

    /**
     * @return string
     */
    abstract public function name(): string;

    public function styles(): array
    {
        return [];
    }

    public function scripts(): array
    {
        return [];
    }

    public function id(): string
    {
        return \Illuminate\Support\Str::kebab($this->name());
    }

}
