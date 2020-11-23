<?php

namespace Twigger\Blade\Foundation;

class AssetStore
{

    private $scripts = [];

    private $styles = [];

    public function registerScript(string $script)
    {
        if(!in_array($script, $this->scripts)) {
            $this->scripts[] = $script;
        }
    }

    public function registerStyle(string $style)
    {
        if(!in_array($style, $this->styles)) {
            $this->styles[] = $style;
        }
    }

    public function allStyles(): array
    {
        return $this->styles;
    }

    public function allScripts(): array
    {
        return $this->scripts;
    }

}
