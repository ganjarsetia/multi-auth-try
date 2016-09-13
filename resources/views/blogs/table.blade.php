<table class="table table-responsive" id="blogs-table">
    <thead>
        <th>Title</th>
        <th>Content</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($blogs as $blog)
        <tr>
            <td>{!! $blog->title !!}</td>
            <td>{!! $blog->content !!}</td>
            <td>
                {!! Form::open(['route' => ['blogs.destroy', $blog->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('blogs.show', [$blog->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('blogs.edit', [$blog->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>