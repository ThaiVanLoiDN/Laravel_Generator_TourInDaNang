<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Models\Admin\Tour;
use Illuminate\Support\Facades\DB; 

class PlanForDays extends AbstractWidget
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

        return view("widgets.plan_for_days", [
            'config' => $this->config,
            'arDays' => Tour:: groupBy('daytour')->select(['daytour', DB::raw('count(*) as soluong')])->orderBy('soluong', 'desc')->get()
        ]);
    }
}