<?php

namespace App\Http\Controllers\StuAuth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
class LoginController extends Controller
{
    protected $redirectTo = RouteServiceProvider::HOME_STU;

    public function showLoginForm()
    {
        if(!Auth::guard('students')->check()){
            return view('student_auth.login');
        }
        return redirect()->intended(RouteServiceProvider::HOME_STU);
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'phone' => 'required',
            'password' => 'required',
        ]);

        $credential = [
            'phone' => $request->phone,
            'password' => $request->password
        ];

        $result = Auth::guard('students')->attempt($credential, $request->member);

        if(!$result) {

            throw ValidationException::withMessages([
                'phone' => __('auth.failed'),
            ]);
        }

        $request->session()->regenerate();

        //edit route url to admin dashboard
        return redirect()->intended(RouteServiceProvider::HOME_STU);

    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::guard('students')->logout();
        return redirect()->route('student.login');
    }

}
