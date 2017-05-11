<li id="nav-menu-item-99" class="main-menu-item  menu-item-depth-0 parent dropdown menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children">
<a href="{{ route('frontend.post.index') }}" class="menu-link">Things to do</a>
<a class="dropdown-toggle" data-toggle="dropdown" href=""><b class="caret"></b></a>
    <ul class="dropdown-menu menu-depth-1">
        @foreach ($arCatPosts as $arCatPost)
        <li id="nav-menu-item-223" class="sub-menu-item  menu-item-depth-1 menu-item menu-item-type-taxonomy menu-item-object-things-to-do">
            <a href="{{ route('frontend.post.category', ['slug' => str_slug($arCatPost->name), 'id' => $arCatPost->id]) }}" class="menu-link">
            	{{ $arCatPost->name }}
            </a>
        </li>
       @endforeach
    </ul>
</li>