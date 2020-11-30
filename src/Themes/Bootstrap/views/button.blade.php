<button {{ $attributes->merge(['class' => $classes]) }} {{($disabled === true ? 'disabled' : '')}}>
    {{$slot}}
</button>
