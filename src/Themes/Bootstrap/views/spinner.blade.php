<div {{$attributes->merge([
    'class' => sprintf('spinner-border %s text-%s', ($size === null ? '' : ' spinner-border-' . $size), $variant),
    'role' => 'status'
])}}>
    <span class="visually-hidden">{{$alt}}</span>
</div>
