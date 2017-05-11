<table class="table table-responsive table-bordered" id="categoryPosts-table">
    <thead>
        <th>Name</th>
        <th class="text-center" colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($categoryPosts as $categoryPost)
        <tr>
            <td>{!! $categoryPost->name !!}</td>
            <td class="text-center">
                {!! Form::open(['route' => ['admin.categoryPosts.destroy', $categoryPost->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.categoryPosts.show', [$categoryPost->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.categoryPosts.edit', [$categoryPost->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>