<li id="nav_menu-2" class="widget-container widget_nav_menu">
    <h4 class="widget-title">Da Nang Tour</h4>
    <div class="menu-da-nang-tour-container">
        <ul id="menu-da-nang-tour" class="menu">
            @foreach ($arCatTours as $arCatTour)
            <li id="menu-item-261" class="menu-item menu-item-type-taxonomy menu-item-object-travel-style menu-item-261">
                <a href="{{ route('frontend.tour.category', ['slug' => str_slug($arCatTour->name), 'id' => $arCatTour->id]) }}">{{ $arCatTour->name }}</a>
            </li>
            @endforeach
    </div>
</li>
