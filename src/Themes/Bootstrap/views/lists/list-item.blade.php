@if($href === null)
    <li {{$attributes->merge([
    'class' => $classes,
    'aria-disabled' => ($disabled === true ? 'true' : 'false'),
    'tabindex' => ($disabled === true ? '-1' : '0'),
])}}>
        {{$slot}}
    </li>
@else
    <a {{$attributes->merge([
        'href' => $href,
        'class' => sprintf('%s list-group-item-action', $classes),
        'aria-disabled' => ($disabled === true ? 'true' : 'false'),
        'tabindex' => ($disabled === true ? '-1' : '0'),
    ])}}>
        {{$slot}}
    </a>
@endif
