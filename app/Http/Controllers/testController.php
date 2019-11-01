<?php

namespace App\Http\Controllers;
use App\Models\Device\Device;

use Illuminate\Http\Request;

class testController extends Controller
{
    public function test()
    {
    	// $token =['c9HN3hACfE0:APA91bFX_jQ5SQGdsSBqn-6xHKOUCYGnfSBJYMYFQ03Pa8DvKDUJqmbPU87N9eoChb5eSyxAFxfwKHPe9nOJ5MRZCYOQZGb1J3OWML2VHKGP81ijZ_DdAVEnXXgtdVNFsy6n9MeT9Ivb','cQHs1UiJm28:APA91bEc1MPLU64nY2WCfE0q8il2ilkXwS1eMzhjd0hkXxCXRSTxM9TTiWr9PZZdALvg6xVsQ_dftAgeNlPNkVn2IYNDLu8m8nNSrNnTU78Turn744IalrFlglBMCLYwfYzDkZ1vQSjP'];
    

    	$token = array_column(Device::where('user_id',5)->get(['fcm_token'])
    		->toArray(),'fcm_token');
    		sendPushNotificationToFCMSever($token,"Chef App Notification");

    }
}
