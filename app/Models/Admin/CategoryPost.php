<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Admin\Post;

/**
 * Class CategoryPost
 * @package App\Models\Admin
 * @version February 21, 2017, 7:37 am UTC
 */
class CategoryPost extends Model
{
    use SoftDeletes;

    public $table = 'category_posts';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|min:5|max:200'
    ];

    public function post()
    {
        return $this->hasMany(Post::class);
    }

    
}
