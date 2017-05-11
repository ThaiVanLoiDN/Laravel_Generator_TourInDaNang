<li id="nav-menu-item-138" class="main-menu-item  menu-item-depth-0 parent dropdown menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children"><a href="" class="menu-link">Tours</a><a class="dropdown-toggle" data-toggle="dropdown" href=""><b class="caret"></b></a>
    <ul class="dropdown-menu menu-depth-1">
    	@foreach ($arCatTours as $arCatTour)
        <li id="nav-menu-item-375" class="sub-menu-item  menu-item-depth-1 menu-item menu-item-type-taxonomy menu-item-object-travel-style">
            <a href="{{ route('frontend.tour.category', ['slug' => str_slug($arCatTour->name), 'id' => $arCatTour->id]) }}" class="menu-link">
            	{{ $arCatTour->name }}
            </a>
        </li>
    	@endforeach        
    </ul>
</li>