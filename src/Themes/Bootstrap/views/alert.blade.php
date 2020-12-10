<div {{$attributes->merge([
    'class' => sprintf('alert alert-%s %s', $variant, ($dismissible === true ? 'alert-dismissible fade show' : '')),
    'role' => 'alert'
])}} >
    <span class="visually-hidden">{{$variantAlt()}}</span>
    {{$slot}}
    @if($dismissible === true)
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    @endif
</div>
