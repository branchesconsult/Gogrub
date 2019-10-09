<?php

namespace App\Http\Controllers\Api\V1\Rider;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\UserRegistrationRequest;
use App\Models\Access\User\User;
use App\Models\Access\Role\Role;
use App\Repositories\Frontend\Access\User\UserRepository;
use Config;
use JWTAuth;
use Validator;
use App\Http\Requests\Api\Auth\UserLoginRequest;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Controllers\Api\V1\APIController;
// use Validator;


class RiderAuthController extends APIController

{  


 protected $repository;

    /**
     * __construct.
     *
     * @param $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Register User.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     *
    
     */
      // 
    public function login(UserLoginRequest $request)
    {
        // dd("yeah stop in login");
        $credentials = $request->only(['mobile', 'password']);

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return $this->throwValidation(trans('api.messages.login.failed'));
            }
        } catch (JWTException $e) {
            return $this->respondInternalError($e->getMessage());
        }

        if (!empty($request->get('fcm_token'))) {
            $deviceToken = [
                'fcm_token' => $request->get('fcm_token'),
                'device_id' => $request->device_id
            ];
            $deviceInfo = [
                'type' => $request->get('device_type'),
                'agent_info' => $request->header('User-Agent'),
                'device_id' => $request->device_id
            ];
            User::find(\Auth::id())->devices()->updateOrCreate($deviceToken, $deviceInfo);
        }

//        if ($request->headers->has('Device-Type') && $request->header('Device-Type') == 'browser') {
//            dd(\Auth::attempt($request->only('mobile', 'password')));
//        }

        return response()->json([
            'message_title' => "Success",
            'message' => trans('api.messages.login.success'),
            'token' => $token,
            'status_code' => 200,
            'success' => true,
            'user' => User::select('id','full_name','email','mobile')->where('id'
,Auth::user()->id)->first(),
        ]);

    }
    public function profile()
    { 
        $user=User::where('id',Auth::user()->id)->first();
        return response()->json(
            [
                'message_title' => "Success",
                'user'=>$user,
                'status_code' => 200,
                'success' => true,
            ]);
    }
    public function register(UserRegistrationRequest $request)
    {
        // call from api rider/register 
        
        // we set rider role  to that user
        $user = $this->repository->create($request->all());
        $role=Role::where('name','Rider')->first();
       	$user->attachRole($role);

        if (!Config::get('api.register.release_token')) {
            return $this->respondCreated([
                'message' => trans('api.messages.registeration.success'),
            ]);
        }

        $token = JWTAuth::fromUser($user);
        $user=\App\Models\Access\User\User::select('id','full_name','mobile','email')->where('id', $user->id)->first();

        return response()->json([
            'message_title' => "Success",
            'message' => trans('api.messages.registeration.success'),
            'token' => $token,
            'user' => $user,
            'status_code' => 200,
            'success' => true,
        ]);
    }
}
