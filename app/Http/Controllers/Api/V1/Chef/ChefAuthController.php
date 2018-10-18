<?php

namespace App\Http\Controllers\Api\V1\Chef;

use App\Http\Requests\Api\Chef\ChefRegRequest;
use App\Models\Access\User\User;
use App\Models\Access\Usermeta\Usermeta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Unisharp\FileApi\FileApi;

class ChefAuthController extends Controller
{
    public function storeRegistraton(ChefRegRequest $request)
    {
        $chefDocImages = [];
        //Upload cnic
        if ($request->hasFile('cnic_image')) {
            $chefDocImages['cnic_image'] = $this->uploadChefDocs($request->file('cnic_image'));
        }
        //upload kitchen
        if ($request->hasFile('kitchen_image')) {
            $chefDocImages['kitchen_image'] = $this->uploadChefDocs($request->file('kitchen_image'));
        }
        $userMetaRecord = [];
        $couter = 0;
        foreach ($chefDocImages as $key => $val) {
            foreach ($val as $k1 => $v1) {
                $userMetaRecord[$couter]['meta_key'] = $key . '_' . $k1;
                $userMetaRecord[$couter]['meta_value'] = $key . $v1;
                $userMetaRecord[$couter]['user_id'] = \Auth::id();
                $userMetaRecord[$couter]['created_at'] = Carbon::now();
                $userMetaRecord[$couter]['updated_at'] = Carbon::now();
                $couter++;
            }
        }
        Usermeta::insert($userMetaRecord);
        return apiSuccessRes('Thank you for your interest, we will get back to you within 48 working hours');
    }

    public function uploadChefDocs($imagesInput)
    {
        $chefDocs = [];
        $chefDocsUploadPath = env('LFM_UPLOADS_CHEF_DOCS');
        foreach ($imagesInput as $key => $val) {
            $fileApi = new FileApi($chefDocsUploadPath);
            $chefDocs[] = $chefDocsUploadPath . $fileApi->save($val);
        }
        return $chefDocs;
    }
}
