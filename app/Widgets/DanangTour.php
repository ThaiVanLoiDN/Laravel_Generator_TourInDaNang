<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Models\Admin\CategoryTour;

class DanangTour extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */


    protected $config = [
    ];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        //

        return view("widgets.danang_tour", [
            'arCatTours' => CategoryTour::all(),
        ]);
    }
}