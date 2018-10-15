<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\UpdateNonVerifyMobileRequest;
use App\Http\Requests\Api\Auth\UserMobileVerificationRequest;
use App\Models\Access\User\User;
use App\Notifications\Frontend\Auth\UserNeedsConfirmation;
use App\Repositories\Frontend\Access\User\UserRepository;
use Illuminate\Http\Request;

/**
 * Class ConfirmAccountController.
 */
class ConfirmAccountController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $user;

    /**
     * ConfirmAccountController constructor.
     *
     * @param UserRepository $user
     */
    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    /**
     * @param $token
     *
     * @return mixed
     */
    public function confirm($token)
    {
        $this->user->confirmAccount($token);

        return redirect()->route('frontend.auth.login')->withFlashSuccess(trans('exceptions.frontend.auth.confirmation.success'));
    }

    /**
     * @param $user
     *
     * @return mixed
     */
    public function sendConfirmationEmail(User $user)
    {
        $user->notify(new UserNeedsConfirmation($user->confirmation_code));

        return redirect()->route('frontend.auth.login')->withFlashSuccess(trans('exceptions.frontend.auth.confirmation.resent'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateNonVerifiedNumber(Request $request)
    {
        $isUserConfirmed = (boolean)\Auth::user()->confirmed;
        if (!$isUserConfirmed) {
            $user = User::find(\Auth::id());
            $user->mobile = substr($request->value, -10); //X-editable speial change
            $user->save();
            return response()->json([
                'message_title' => "Success",
                'message' => 'Phone number updated.',
                'status_code' => 200,
                'success' => true,
                'user' => \Auth::user()
            ]);
        }
    }

    /**
     * @param UserMobileVerificationRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function verifyMobile(UserMobileVerificationRequest $request)
    {
        $apiAuthController = new AuthController();
        return $apiAuthController->verifyMobile($request);
    }
}
