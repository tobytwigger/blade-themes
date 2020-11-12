@foreach(app()->make(\Twigger\Blade\Foundation\ScriptStore::class)->allScripts() as $script)
    {!! $script !!}
@endforeach

@stack('theme-scripts')

