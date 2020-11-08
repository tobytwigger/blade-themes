<?php

namespace Twigger\Blade\Foundation;

use Twigger\Blade\Themes\Material\MaterialTheme;

class ThemeStore
{

    /**
     * @var ThemeDefinition[]
     */
    private $themes = [];

    public function registerTheme(ThemeDefinition $themeDefinition)
    {
        $this->themes[$themeDefinition::id()] = $themeDefinition;
    }

    public function hasTheme(string $id)
    {
        return array_key_exists($id, $this->themes);
    }

    public function getTheme(string $id): ThemeDefinition
    {
        if($this->hasTheme($id)) {
            return $this->themes[$id];
        }
        throw new \Exception(
            sprintf('Theme %s could not be found.', $id)
        );
    }

    /**
     * @return ThemeDefinition[]
     */
    public function allThemes(): array
    {
        return $this->themes;
    }

    public function count(): int
    {
        return count($this->themes);
    }

}
