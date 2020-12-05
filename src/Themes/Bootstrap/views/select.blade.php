<div class="form-group">
    @include('bootstrap-theme::input.label')

    <select {{ $attributes->merge([
        'class' => sprintf('form-control %s', $validClasses()),
        'id' => $id,
        'name' => $name,
        'aria-describedby' => sprintf('%s %s', $id . '-theme-label', ($validated === true && $isValid() === false ? $id . '-theme-errors' : '')),
        'value' => $value,
        'aria-required' => ($required === true ? 'true' : 'false' ),
        'aria-disabled' => ($disabled === true ? 'true' : 'false' )])
    }} {{$required === true ? 'required' : ''}} {{$disabled === true ? 'disabled' : ''}}>

        @foreach($items as $value => $item)
            @if(is_array($item))
                <optgroup label="{{$value}}">
                    @foreach($item as $v => $i)
                        <option value="{{$v}}">{{$i}}</option>
                    @endforeach
                </optgroup>
            @else
                <option value="{{$value}}">{{$item}}</option>
            @endif
        @endforeach
    </select>


    @include('bootstrap-theme::input.help')

    @include('bootstrap-theme::input.errors')

</div>
