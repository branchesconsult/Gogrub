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

class RiderAuthController extends Controller

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

        return response()->json([
            'message_title' => "Success",
            'message' => trans('api.messages.registeration.success'),
            'token' => $token,
            'user' => \App\Models\Access\User\User::where('id', $user->id)->first(),
            'status_code' => 200,
            'success' => true,
        ]);
    }
}
