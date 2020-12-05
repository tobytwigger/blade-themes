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
