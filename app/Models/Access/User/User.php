<?php

namespace App\Models\Access\User;

use App\Models\Access\User\Traits\Attribute\UserAttribute;
use App\Models\Access\User\Traits\Relationship\UserRelationship;
use App\Models\Access\User\Traits\Scope\UserScope;
use App\Models\Access\User\Traits\UserAccess;
use App\Models\Access\User\Traits\UserSendPasswordReset;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * Class User.
 */
class User extends Authenticatable implements JWTSubject
{
    use UserScope,
        UserAccess,
        Notifiable,
        SoftDeletes,
        UserAttribute,
        UserRelationship,
        UserSendPasswordReset;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;
    protected $guarded = [];
    protected $appends = ['avg_rating', 'applied_as_chef'];

//    /**
//     * The attributes that are mass assignable.
//     *
//     * @var array
//     */
//    protected $fillable = [
//        'first_name',
//        'last_name',
//        'email',
//        'status',
//        'confirmation_code',
//        'confirmed',
//        'created_by',
//        'updated_by',
//    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('access.users_table');
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [
            'id' => $this->id,
            'full_name' => $this->full_name,
            'mobile' => $this->mobile,
            'email' => $this->email,
            'picture' => $this->getPicture(),
            'confirmed' => $this->confirmed,
            'registered_at' => $this->created_at->toIso8601String(),
            'last_updated_at' => $this->updated_at->toIso8601String(),
        ];
    }

    public function getAvgRatingAttribute()
    {
        return $this->ratingReviews()->avg('rating') ?? 0;
    }

    public function getAppliedAsChefAttribute()
    {
        return access()->hasRole('Chef') ? true : (boolean)$this->meta()->where('meta_key', 'cnic_image_0')
            ->where('user_id', $this->id)
            ->count();
    }

    /**
     * Ignore is_chef in database, I was stupid in this metter
     * @return bool
     */
    public function getIsChefAttribute()
    {
        return access()->hasRole('Chef') ? true : false;
    }

    public function getAvatarAttribute($val)
    {
        if (empty($val) || !\File::exists(public_path($val))) {
            return asset('img/default_chef.jpg');
        }
        if (filter_var($val, FILTER_VALIDATE_URL)) {
            return $val;
        } else {
            return str_replace(['public'], '', asset($val));
        }
    }
}
