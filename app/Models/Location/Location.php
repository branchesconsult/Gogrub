<?php

namespace App\Models\Location;

use App\Models\ModelTrait;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;
use Grimzy\LaravelMysqlSpatial\Types\Point;
use Illuminate\Database\Eloquent\Model;
use App\Models\Location\Traits\LocationAttribute;
use App\Models\Location\Traits\LocationRelationship;

class Location extends Model
{
    use ModelTrait,
        LocationAttribute,
        SpatialTrait,
        LocationRelationship {
        // LocationAttribute::getEditButtonAttribute insteadof ModelTrait;
    }

    const PROVINCES = [
        'punjab' => 1,
        'sindh' => 2,
        'kpk' => 3
    ];

    const COUNTRIES = ['PK' => 1];
    const CITIES = ['LHR' => 1];

    const USER_ROLES = [
        'Chef' => 'chef',
        'Customer' => 'customer'
    ];


    /**
     * NOTE : If you want to implement Soft Deletes in this model,
     * then follow the steps here : https://laravel.com/docs/5.4/eloquent#soft-deleting
     */

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'locations';

    /**
     * Mass Assignable fields of model
     * @var array
     */
    protected $fillable = [

    ];

    /**
     * Default values for model fields
     * @var array
     */
    protected $attributes = [

    ];

    /**
     * Dates
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $spatialFields = [
        'location_point'
    ];

    /**
     * Guarded fields of model
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    /**
     * Constructor of Model
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function setLocationPointAttribute($val)
    {
        // dd($val);
        //$val = lat,lng
        $val = explode(',', $val);
        // dd($val);
        $this->attributes['location_point'] = new Point($val[0], $val[1]);
    }


    /**
     * @return string
     */
    public function getEditButtonAttribute($permission, $route)
    {
        if (access()->allow($permission)) {
            return '<a href="' . route($route, $this) . '?chef_id=' . $this->id . '" class="btn btn-flat btn-default">
                    <i data-toggle="tooltip" data-placement="top" title="Edit" class="fa fa-pencil"></i>
                </a>';
        }
    }
}
