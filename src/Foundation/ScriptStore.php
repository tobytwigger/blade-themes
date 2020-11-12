<?php

namespace Twigger\Blade\Foundation;

class ScriptStore
{

    private $scripts = [];

    public function registerScript(string $script)
    {
        $this->scripts[] = $script;
    }

    public function allScripts(): array
    {
        return $this->scripts;
    }

}
