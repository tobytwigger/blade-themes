<div class="form-check {{($inline ? 'form-check-inline': '')}}">
    <input type="checkbox" {{ $attributes->merge([
        'class' => sprintf('form-check-input %s', $validClasses()),
        'id' => $id,
        'name' => $name,
        'aria-describedby' => sprintf('%s %s', $id . '-theme-label', ($validated === true && $isValid() === false ? $id . '-theme-errors' : '')),
        'checked' => $checked,
        'value' => $value,
        'aria-required' => ($required === true ? 'true' : 'false' ),
        'aria-disabled' => ($disabled === true ? 'true' : 'false' )])
    }} {{$required === true ? 'required' : ''}} {{$disabled === true ? 'disabled' : ''}}>

    @include('bootstrap-theme::input.label', ['labelClasses' => 'form-check-label'])

    @include('bootstrap-theme::input.help')

    @include('bootstrap-theme::input.errors')

</div>
