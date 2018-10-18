<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Api\Auth\ForgotPasswordRequest;
use App\Models\User\User;
use App\Notifications\Frontend\Auth\UserNeedsPasswordReset;
use App\Repositories\Frontend\Access\User\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Validator;

class ForgotPasswordController extends APIController
{
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
     * Send a reset link to the given user.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendResetLinkEmail(ForgotPasswordRequest $request)
    {

        $user = $this->repository->findByEmail($request->get('email'));

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );
        if ($response == Password::RESET_LINK_SENT) {
//            $token = $this->repository->saveToken();
//            $user->notify(new UserNeedsPasswordReset($token));
            return apiSuccessRes(trans('api.messages.forgot_password.success'));
        } else {
            return apiErrorRes(trans('api.messages.forgot_password.validation.email_not_found'));
        }
    }

    /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker()
    {
        return Password::broker();
    }
}
