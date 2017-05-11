<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Tour;
use InfyOm\Generator\Common\BaseRepository;

class TourRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'id_category',
        'daytour',
        'preview',
        'content',
        'image',
        'price',
        'id_user'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Tour::class;
    }
}
