
<li class="{{ Request::is('admin/tours*') ? 'active' : '' }}">
    <a href="{!! route('admin.tours.index') !!}"><i class="fa fa-edit"></i><span>Tours</span></a>
</li>

<li class="{{ Request::is('admin/type-of-tours*') ? 'active' : '' }}">
    <a href="{!! route('admin.categoryTours.index') !!}"><i class="fa fa-edit"></i><span>Type of tours</span></a>
</li>

<li class="{{ Request::is('admin/posts*') ? 'active' : '' }}">
    <a href="{!! route('admin.posts.index') !!}"><i class="fa fa-edit"></i><span>Posts</span></a>
</li>

<li class="{{ Request::is('admin/things-to-do*') ? 'active' : '' }}">
    <a href="{!! route('admin.categoryPosts.index') !!}"><i class="fa fa-edit"></i><span>Things to do</span></a>
</li>

<li class="{{ Request::is('admin/contacts*') ? 'active' : '' }}">
    <a href="{!! route('admin.contacts.index') !!}"><i class="fa fa-edit"></i><span>Contacts</span></a>
</li>
<li class="{{ Request::is('admin/information*') ? 'active' : '' }}">
    <a href="{!! route('admin.information.index') !!}"><i class="fa fa-edit"></i><span>Information</span></a>
</li>
<li class="{{ Request::is('admin/cities*') ? 'active' : '' }}">
    <a href="{!! route('admin.cities.index') !!}"><i class="fa fa-edit"></i><span>Cities</span></a>
</li>

<li class="{{ Request::is('admin/users*') ? 'active' : '' }}">
    <a href="{!! route('admin.user.index') !!}"><i class="fa fa-edit"></i><span>User</span></a>
</li>