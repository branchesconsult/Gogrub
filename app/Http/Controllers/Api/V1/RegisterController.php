<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Api\Auth\UserRegistrationRequest;
use App\Models\User\User;
use App\Repositories\Frontend\Access\User\UserRepository;
use Config;
use Illuminate\Http\Request;
use JWTAuth;
use Validator;

/**
 * @resource Auth
 *
 * All auth related functions
 */
class RegisterController extends APIController
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
     * @Request
     * full_name:umair hamid
     * email:umair_hamid100@yahoo.com
     * mobile:3334965841
     * password:123456
     * password_confirmation:123456
     */
    public function register(UserRegistrationRequest $request)
    {
        // call from api register 
        
        $user = $this->repository->create($request->all());

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
