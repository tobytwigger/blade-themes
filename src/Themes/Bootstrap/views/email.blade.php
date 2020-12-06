<div class="form-group">
    @include('bootstrap-theme::input.label')

    <input type="email" {{ $attributes->merge([
        'class' => sprintf('form-control %s', $validClasses()),
        'id' => $id,
        'name' => $name,
        'aria-describedby' => sprintf('%s %s', $id . '-theme-label', ($validated === true && $isValid() === false ? $id . '-theme-errors' : '')),
        'value' => $value,
        'aria-required' => ($required === true ? 'true' : 'false' ),
        'aria-disabled' => ($disabled === true ? 'true' : 'false' )])
    }} {{$required === true ? 'required' : ''}} {{$disabled === true ? 'disabled' : ''}}>


    @include('bootstrap-theme::input.help')

    @include('bootstrap-theme::input.errors')

</div>
