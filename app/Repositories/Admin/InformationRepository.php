<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Information;
use InfyOm\Generator\Common\BaseRepository;

class InformationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'content'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Information::class;
    }
}
