<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Admin\CategoryPost;
use App\User;

/**
 * Class Post
 * @package App\Models\Admin
 * @version February 21, 2017, 8:01 am UTC
 */
class Post extends Model
{
    use SoftDeletes;

    public $table = 'posts';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'id_category',
        'preview',
        'content',
        'image',
        'id_user'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'id_category' => 'integer',
        'preview' => 'string',
        'content' => 'string',
        'image' => 'string',
        'id_user' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|min:5|max:200',
        'id_category' => 'required',
        'preview' => 'required|min:5|max:500',
        'content' => 'required|min:5',
        'image' => 'mimes:jpg,jpeg,bmp,png|max:2000',
    ];

    public function category()
    {
        return $this->belongsTo(CategoryPost::class, 'id_category');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    
}
