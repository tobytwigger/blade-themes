<div class="alert alert-danger" role="alert" style="width: 50%">
    <h4 class="alert-heading">{{$header}}</h4>
    <ul>
        @foreach($errorsAsArray() as $id => $errorArray)
            <li>
                {{\Illuminate\Support\Str::title($id)}}
                <ul>
                    @foreach($errorArray as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
</div>
