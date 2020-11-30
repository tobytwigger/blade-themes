<div {{$attributes->merge([
    'class' => sprintf('alert alert-%s %s', $variant, ($dismissible === true ? 'alert-dismissible fade show' : '')),
    'role' => 'alert'
])}} >
    <span class="sr-only">{{$variantAlt()}}.</span>
    {{$slot}}
    @if($dismissible === true)
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    @endif
</div>
