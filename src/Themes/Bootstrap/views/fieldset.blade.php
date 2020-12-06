<fieldset {{$attributes}} @if($disabled === true) disabled @endif>
    <legend>{{$legend}}</legend>
    {{$slot}}
</fieldset>
