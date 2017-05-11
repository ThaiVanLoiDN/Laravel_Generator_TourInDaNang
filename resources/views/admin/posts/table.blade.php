<table class="table table-responsive table-bordered" id="posts-table">
    <thead>
        <th>Name</th>
        <th class="text-center">Category</th>
        <th class="text-center">Author</th>
        <th class="text-center">Created At</th>
        <th colspan="3" class="text-center">Action</th>
    </thead>
    <tbody>
    @foreach($posts as $post)
        <tr>
            <td>{!! $post->name !!}</td>
            <td class="text-center">{!! $post->category->name !!}</td>
            <td class="text-center">{!! $post->user->name !!}</td>
            <td class="text-center">{!! date('d-m-Y', strtotime($post->created_at)) !!}</td>
            <td class="text-center">
                {!! Form::open(['route' => ['admin.posts.destroy', $post->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.posts.show', [$post->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.posts.edit', [$post->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
