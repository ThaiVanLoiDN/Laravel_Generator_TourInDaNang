<?php

namespace App\Repositories\Admin;

use App\Models\Admin\CategoryTour;
use InfyOm\Generator\Common\BaseRepository;

class CategoryTourRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CategoryTour::class;
    }
}
