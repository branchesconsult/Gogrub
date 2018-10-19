<?php

namespace App\Models\Chat;

use App\Models\Access\User\User;
use App\Models\BaseModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Chat extends BaseModel
{
    protected $table = 'chats';

    protected $appends = ['is_sender'];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

//    public function getCreatedAtAttribute()
//    {
//        return Carbon::createFromTimeStamp(strtotime($this->created_at))->diffForHumans();
//    }

    public function getIsSenderAttribute()
    {
        return ($this->sender_id == \Auth::id()) ? true : false;
    }
}
