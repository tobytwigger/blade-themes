<div {{$attributes->merge([
    'class' => sprintf('spinner-border %s text-%s', ($size === null ? '' : ' spinner-border-' . $size), $variant),
    'role' => 'status'
])}}>
    <span class="sr-only">{{$alt}}</span>
</div>

@once
    @push('theme-styles')
        <style>
            .spinner-border.spinner-border-lg {
                width: 3rem;
                height: 3rem;
            }
        </style>
    @endpush
@endonce
