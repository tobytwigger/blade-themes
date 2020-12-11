<div class="card" {{ $attributes }}>
    @if($imageSrc)
        <img class="card-img-top" src="{{$imageSrc}}" alt="{{$imageAlt}}" >
    @endif
    <div class="card-body">
        @if($title)
            <h5 class="card-title">{{ $title }}</h5>
        @endif
        @if($subtitle)
            <h6 class="card-subtitle mb-2 text-muted">{{  $subtitle }}</h6>
        @endif
        <p class="card-text">
            {{$body}}
        </p>

        {{$actions}}
    </div>
</div>
