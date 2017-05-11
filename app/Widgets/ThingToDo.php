<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Models\Admin\CategoryPost;

class ThingToDo extends AbstractWidget
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

        return view("widgets.thing_to_do", [
            'arCatPosts' => CategoryPost::all(),
        ]);
    }
}