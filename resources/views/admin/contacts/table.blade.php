<table class="table table-responsive table-bordered" id="contacts-table">
    <thead>
        <th>Fullname</th>
        <th class="text-center">Phone</th>
        <th class="text-center">Mail</th>
        <th>Content</th>
        <th class="text-center" colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($contacts as $contact)
        <tr>
            <td>{!! $contact->fullname !!}</td>
            <td class="text-center">{!! $contact->phone !!}</td>
            <td class="text-center">{!! $contact->mail !!}</td>
            <td>{!! str_limit($contact->content, 80) !!}</td>
            <td class="text-center">
                {!! Form::open(['route' => ['admin.contacts.destroy', $contact->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.contacts.show', [$contact->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>