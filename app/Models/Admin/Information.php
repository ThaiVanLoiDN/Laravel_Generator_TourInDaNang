<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Information
 * @package App\Models\Admin
 * @version March 2, 2017, 3:43 am UTC
 */
class Information extends Model
{
    use SoftDeletes;

    public $table = 'information';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'content'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'content' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|min:5|max:200',
        'content' => 'required|min:5'
    ];

    
}
