<div class="form-group">
    <label for="theme">Choose a Theme</label>
    <select class="form-control" id="theme" name="theme">
        @foreach($items as $item)
            <option value="{{$item['value']}}">{{$item['label']}}</option>
        @endforeach
    </select>
</div>
