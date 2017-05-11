<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Admin\CategoryTour;
use App\Models\Admin\City;
use App\User;

/**
 * Class Tour
 * @package App\Models\Admin
 * @version February 21, 2017, 8:38 am UTC
 */
class Tour extends Model
{
    use SoftDeletes;

    public $table = 'tours';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'id_category' => 'integer',
        'daytour' => 'integer',
        'preview' => 'string',
        'content' => 'string',
        'image' => 'string',
        'price' => 'integer',
        'id_user' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|min:5|max:200',
        'id_category' => 'required|numeric',
        'daytour' => 'required|numeric',
        'preview' => 'required|min:5',
        'content' => 'required|min:5',
        'price' => 'required|numeric',
        'image' => 'mimes:jpg,jpeg,bmp,png|max:2000',
        'cities' => 'required',
    ];

    public function category()
    {
        return $this->belongsTo(CategoryTour::class, 'id_category');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function city()
    {
        return $this->belongsToMany(City::class, 'cities_tours', 'tour_id', 'city_id');
    }
    
}
