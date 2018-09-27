<?php

namespace App\Models\RatingReviews;

use App\Models\Access\User\User;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;

class RatingReview extends BaseModel
{
    protected $table = 'rating_reviews';
    protected $guarded = [];

    /**
     * Get the post that owns the comment.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
