<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Contact
 * @package App\Models\Admin
 * @version February 21, 2017, 8:22 am UTC
 */
class Contact extends Model
{
    use SoftDeletes;

    public $table = 'contacts';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'fullname',
        'phone',
        'mail',
        'content',
        'subject',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'fullname' => 'string',
        'phone' => 'string',
        'mail' => 'string',
        'content' => 'string',
        'subject' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'fullname' => 'required|min:5|max:100',
        'phone' => 'required|min:10|max:20',
        'mail' => 'required|min:10|max:50',
        'content' => 'required|min:10',
        'subject' => 'required|min:5|max:100',
    ];

    
}
