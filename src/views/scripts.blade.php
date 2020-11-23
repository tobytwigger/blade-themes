@foreach(app()->make(\Twigger\Blade\Foundation\AssetStore::class)->allScripts() as $script)
    {!! $script !!}
@endforeach

@stack('theme-scripts')

