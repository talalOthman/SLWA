<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Google login
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Google call back
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();

        $this->_registerOrLoginUser($user);

        //returning home after login
        return redirect()->route('home');
    }


    // Facebook login
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    // Facebook call back
    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();

        $this->_registerOrLoginUser($user);

        //returning home after login
        return redirect()->route('home');
    }


     // Github login
     public function redirectToGithub()
     {
         return Socialite::driver('github')->redirect();
     }
 
     // Github call back
     public function handleGithubCallback()
     {
         $user = Socialite::driver('github')->user();
 
         $this->_registerOrLoginUser($user);

         //returning home after login
         return redirect()->route('home');
     }


     protected function _registerOrLoginUser($info){

        $user = User::where('email', '=', $info->email)->first();

        if(!$user){
            $user = new User();
            $user->name = $info->name;
            $user->email = $info->email;
            $user->provider_id = $info->id;
            $user->avatar = $info->avatar;
            $user->save();
        }

        Auth::login($user);
     }
}
