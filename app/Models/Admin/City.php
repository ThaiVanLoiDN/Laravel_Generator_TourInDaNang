<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Admin\Tour;

/**
 * Class City
 * @package App\Models\Admin
 * @version March 9, 2017, 2:17 am UTC
 */
class City extends Model
{
    use SoftDeletes;

    public $table = 'cities';
    

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
        'name' => 'required|min:5|max:100'
    ];

    public function tour()
    {
        return $this->belongsToMany(City::class, 'cities_tours', 'city_id', 'tour_id');
    }
}
