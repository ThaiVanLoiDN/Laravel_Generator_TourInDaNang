<table class="table table-responsive table-bordered" id="tours-table">
    <thead>
        <th>Name</th>
        <th class="text-center">Category</th>
        <th class="text-center">Daytour</th>
        <th class="text-center">Price</th>
        <th class="text-center">City</th>
        <th class="text-center">Author</th>
        <th class="text-center">Created At</th>
        <th class="text-center" colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($tours as $tour)
        <tr>
            <td>{!! $tour->name !!}</td>
            <td class="text-center">{!! $tour->category->name !!}</td>
            <td class="text-center">{!! $tour->daytour !!}</td>
            <td class="text-center">${!! $tour->price !!}</td>
            <td class="text-center">
                @foreach ($tour->city as $city)
                    [{!! $city['name'] !!}]
                @endforeach
            </td>
            <td class="text-center">{!! $tour->user->name !!}</td>
            <td class="text-center">{!! date('d-m-Y', strtotime($tour->created_at)) !!}</td>
            <td class="text-center">
                {!! Form::open(['route' => ['admin.tours.destroy', $tour->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.tours.show', [$tour->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.tours.edit', [$tour->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>