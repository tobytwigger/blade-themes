<div class="form-group">
    <label for="{{$id}}" id="{{$id}}-theme-label">{{$label}}</label>

    <select {{ $attributes->merge([
        'class' => sprintf('form-control %s', $validClasses()),
        'id' => $id,
        'name' => $name,
        'aria-describedby' => sprintf('%s %s', $id . '-theme-label', ($validated === true && $isValid() === false ? $id . '-theme-errors' : ''))
    ]) }} >
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

    @if($validated === true && $isValid() === false)
        <div class="invalid-feedback" id="{{$id}}-theme-errors">
            @if(count($errors) === 1)
                {{array_values($errors)[0]}}
            @else
                <ul>
                    @foreach($errors as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    @endif

    @if($help !== null)
        <small id="{{$id}}-themes-help" class="form-text text-muted">{{$help}}</small>
    @endif

</div>
