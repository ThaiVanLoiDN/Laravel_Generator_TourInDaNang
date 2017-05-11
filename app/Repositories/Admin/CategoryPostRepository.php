<?php

namespace App\Repositories\Admin;

use App\Models\Admin\CategoryPost;
use InfyOm\Generator\Common\BaseRepository;

class CategoryPostRepository extends BaseRepository
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
        return CategoryPost::class;
    }
}
