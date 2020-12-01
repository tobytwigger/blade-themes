<div class="alert alert-danger" role="alert" style="width: 50%">
    <h4 class="alert-heading">{{$header}}</h4>
    <ul>
        @foreach($errorsAsArray() as $id => $errorArray)
            <li>
                {{\Illuminate\Support\Str::title($id)}}
                @foreach($errorArray as $error)
                    <ul>
                        {{$error}}
                    </ul>
                @endforeach
            </li>
        @endforeach
    </ul>
</div>
