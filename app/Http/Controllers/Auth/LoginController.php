<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        if(method_exists($this, 'hasTooManyLoginAttempts') && $this->hasTooManyLoginAttempts($request))
        {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        if($this->guard()->validate($this->credentials($request)))
        {
            $user = $this->guard()->getLastAttempted();

            if($user->enabled && $this->attemptLogin($request))
            {
                return $this->sendLoginResponse($request);
            }
            else{
                $this->incrementLoginAttempts($request);
                return redirect()->back()->withInput($request->only($this->username(), 'remember'))->withErrors(['enabled' => 'You must be enabled to login.']);
            }
        }

        $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);
    }
}