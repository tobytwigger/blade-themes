<select class="form-control" id="{{$id}}" name="{{$name}}">
    @foreach($items as $item)
        <option value="{{$item['value']}}">{{$item['label']}}</option>
    @endforeach
</select>
