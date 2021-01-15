<?php

return [
    'theme' => 'bootstrap',
    'tag-prefix' => 'theme',
    'components' => [
        \Twigger\Blade\Schema\Button::class,
        \Twigger\Blade\Schema\Spinner::class,
        \Twigger\Blade\Schema\Alert::class,
        \Twigger\Blade\Schema\Toggle::class,
        \Twigger\Blade\Schema\Link::class,
        \Twigger\Blade\Schema\Select::class,
        \Twigger\Blade\Schema\ErrorSummary::class,
        \Twigger\Blade\Schema\Checkbox::class,
        \Twigger\Blade\Schema\Radio::class,
        \Twigger\Blade\Schema\Text::class,
        \Twigger\Blade\Schema\Email::class,
        \Twigger\Blade\Schema\Password::class,
        \Twigger\Blade\Schema\Lists\ListGroup::class,
        \Twigger\Blade\Schema\Lists\ListItem::class,
        \Twigger\Blade\Schema\FieldSet::class,
        \Twigger\Blade\Schema\Card::class,
        \Twigger\Blade\Schema\Icon::class,

        \Twigger\Blade\Themes\Bootstrap\Components\Layouts\Splash::class
    ],

    'bootstrap' => [
        'font-awesome' => [
            'key' => env('FONT_AWESOME_KEY')
        ]
    ]
];
