@foreach(app()->make(\Twigger\Blade\Foundation\AssetStore::class)->allStyles() as $style)
    {!! $style !!}
@endforeach

@stack('theme-styles')

