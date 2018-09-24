<?php

namespace App\Models\Access\Usermeta;

use App\Models\Access\User\User;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;

class Usermeta extends BaseModel
{
    const KEY_USER_DESC = 'description';
    const KEY_USER_WEBSITE = 'website';
    const KEY_USER_NIC1 = 'nic1';
    const KEY_USER_NIC2 = 'nic2';
    protected $table = 'usermeta';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
