<?php

namespace App\Models\RatingReviews;

use App\Models\Access\User\User;
use App\Models\BaseModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class RatingReview extends BaseModel
{
    protected $table = 'rating_reviews';
    protected $guarded = [];
    protected $appends = ['posted_at'];

    /**
     * Get the post that owns the comment.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getPostedAtAttribute()
    {
        return Carbon::createFromTimeStamp(strtotime($this->created_at))->diffForHumans();
    }
}
