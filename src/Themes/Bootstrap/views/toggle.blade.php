<div class="custom-control custom-switch">
    <input type="checkbox" {{ $attributes->merge([
        'class' => 'custom-control-input',
        'id' => $id
    ])->except(['type']) }}>
    <label class="custom-control-label" for="{{$id}}">{{$slot}}</label>
</div>
