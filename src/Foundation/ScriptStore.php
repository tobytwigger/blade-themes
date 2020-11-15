<?php

namespace Twigger\Blade\Foundation;

class ScriptStore
{

    private $scripts = [];

    public function registerScript(string $script)
    {
        if(!in_array($script, $this->scripts)) {
            $this->scripts[] = $script;
        }
    }

    public function allScripts(): array
    {
        return $this->scripts;
    }

}
