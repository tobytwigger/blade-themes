<ul {{$attributes->merge([
    'class' => sprintf('list-group %s %s', ($horizontal === true? 'list-group-horizontal' : ''), ($bordered === true ? 'list-group-flush' : ''))
])}} >
    {{$slot}}
</ul>
