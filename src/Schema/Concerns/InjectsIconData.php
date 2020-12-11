<?php

namespace Twigger\Blade\Schema\Concerns;

trait InjectsIconData
{

    /**
     * Any additional icon maps to add
     *
     * @var array
     */
    private static $addedIcons = [];


    public function iconData()
    {
        $iconMap = array_merge(
            $this->iconMap(),
            (array_key_exists(static::iconSetName(), static::$addedIcons) ? static::$addedIcons[static::iconSetName()] : [])
        );

        if(array_key_exists($this->iconName(), $iconMap)) {
            return $iconMap[$this->iconName()];
        }

        return $this->defaultIconData();

        // get map defined on child class in an array. Merge with static variable with accessor function (so we can add mappings)
        // Find the right icon and return the map result.
        // If not there, call function to get default icon name
    }

    /**
     * A map of icon names to data needed to render the icon
     *
     * @return array
     */
    abstract public function iconMap(): array;

    /**
     * Add an extra mapping value to the icon to extend the icons available to render
     *
     * @param string $iconName The name of the icon as used
     * @param mixed $implementation The data to pass to the view to render the icon
     * @throws IconValidationException
     */
    public static function addIcon(string $iconName, $implementation)
    {
        if(static::validateMapping($iconName, $implementation)) {
            static::$addedIcons[static::iconSetName()][$iconName] = $implementation;
        }
    }

    /**
     * This method can be overridden to validate custom mappings
     *
     * @param string $iconName Name of the icon as used in the blade component
     * @param mixed $implementation The data to name available for the component
     * @return bool
     * @throws IconValidationException
     */
    static protected function validateMapping(string $iconName, $implementation): bool
    {
        return true;
    }

    /**
     * Return the name of the group of icons used (e.g. font-awesome)
     *
     * @return string
     */
    abstract static protected function iconSetName(): string;

    /**
     * Return the current icon name
     *
     * @return string
     */
    abstract protected function iconName(): string;

    abstract protected function defaultIconData();
}
