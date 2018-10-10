<?php

namespace App\Models\Access\Usermeta;

use App\Models\Access\User\User;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Unisharp\FileApi\FileApi;

class Usermeta extends BaseModel
{
    const KEY_CHEF_DESC = 'chef_intro';
    const KEY_CHEF_WEBSITE = 'chef_website';
//    const KEY_CHEF_NIC1 = 'nic1';
//    const KEY_CHEF_NIC2 = 'nic2';
//    const KEY_CHEF_KITCHEN_IMG = 'chef_kitchen_img';
    protected $table = 'usermeta';
    private $imageKeys = ['kitchen_image', 'cnic_image'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getMetaValueAttribute($val)
    {
        return str_replace(['cnic_image/public', 'kitchen_image/public'],
            'storage', asset($val));
    }
}
