<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\DB;

class Destinations extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        //

        return view("widgets.destinations", [
            'arCity' => DB::table('cities')->join('cities_tours', 'cities.id', '=', 'cities_tours.city_id')
            ->groupBy('id', 'name')
            ->select('id', 'name', DB::raw('count(*) as soluong'))
            ->orderBy('soluong', 'desc')
            ->get(),
        ]);
    }
}