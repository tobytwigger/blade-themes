<?php

namespace Twigger\Blade\Foundation;

class ThemeStore
{

    private $themes = [];

    public function registerTheme(ThemeDefinition $themeDefinition)
    {
        $this->themes[$themeDefinition::id()] = $themeDefinition;
    }

    public function hasTheme(string $id)
    {
        return array_key_exists($id, $this->themes);
    }

    public function getTheme(string $id)
    {
        if($this->hasTheme($id)) {
            return $this->themes[$id];
        }
        throw new \Exception(
            sprintf('Theme %s could not be found.', $id)
        );
    }

    public function allThemes()
    {
        return $this->themes;
    }

    public function count()
    {
        return count($this->themes);
    }

}
