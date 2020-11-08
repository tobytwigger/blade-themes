<h1 align="center">Blade Themes</h1>

<p align="center">
    <strong>A UI framework with dynamic theme injection to dynamically change the appearance of a site.</strong>
</p>

<p align="center">
    <a href="https://github.com/tobytwigger/blade-themes/releases">
        <img src="https://img.shields.io/github/v/release/tobytwigger/blade-themes?label=Latest%20Version&sort=semver&style=plastic" alt="Latest Version">
    </a>
    <a href="https://github.com/tobytwigger/blade-themes/tree/master">
        <img src="https://img.shields.io/github/workflow/status/tobytwigger/blade-themes/build-status/master?label=release%20status&style=plastic" alt="Master branch status">
    </a>
    <a href="https://github.com/tobytwigger/blade-themes/tree/develop">
        <img src="https://img.shields.io/github/workflow/status/tobytwigger/blade-themes/build-status/develop?label=dev%20status&style=plastic" alt="Develop branch status">
    </a>
</p>

<p align="center">
    <a href="http://buymeacoffee.com/translate">
        <img src="https://www.buymeacoffee.com/assets/img/custom_images/orange_img.png" alt="Buy me a coffee">
    </a>
</p>    


## Contents

* [About the Project](#about)
* [Documentation](#docs)
* [Contributing](#contributing)
* [Roadmap](#roadmap)
* [Copyright and Licence](#copyright-and-licence)
* [Contact](#contact)

## About

Description of the project

- Add extra features here

## Docs

First, we register all themes to a store (ThemeStore). These themes are stored in an array in the service provider. 

The schemas are loaded into a schema store (SchemaStore). The config can be used to load a schema, but packages can also do it in the service provider so it doesn't have to be put into config.

We then load the requested theme (ThemeLoader). This can be set in the config, or with the useTheme method on the service provider. The loader gets the theme definition using the ThemeStore

The wanted theme definition is then loaded (ThemeStore). We get all schemas that've been registered, as all these have to be registered as components. We call Blade::component, and pass it the component name from the schema, and use the (ComponentLocator) to get the component class from the theme definition and the component name.

This tries to call the component() function on the theme definition (where component = button, tab etc). This is the theme implementation. If the theme doesn't register the function, it'll just be decided by the AbtractSchema abstract method defaultImplementation(). This will look odd/out of place with some themes, but we have to register something and schemas could be added by packages, meaning we can't ensure there's an implementation always.


We've taken care over documenting everything you'll need to get started and use Blade themes fully.

[Check out the docs](https://tobytwigger.github.io/blade-themes) on our documentation site.

## Contributing

Contributions are welcome! Before contributing to this project, familiarize
yourself with [CONTRIBUTING.md](CONTRIBUTING.md).

## Roadmap

We track any requested changes through issues, so check out the issues tab to see what we're working on!

If you want to get involved in building a feature, check out the issues tab or [email me!](mailto:tobytwigger1@gmail.com)

## Copyright and Licence

This package is copyright © [Toby Twigger](https://github.com/tobytwigger)
and licensed for use under the terms of the MIT License (MIT). Please see
[LICENCE.md](LICENCE.md) for more information.

## Contact

For any questions, suggestions, security vulnerabilities or help, email me directly at [tobytwigger1@gmail.com](mailto:tobytwigger1@gmail.com)
