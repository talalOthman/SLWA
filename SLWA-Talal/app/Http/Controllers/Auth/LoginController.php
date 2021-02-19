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
        $value = $this->_LoginUser($user);

        if($value == "new account"){
            return redirect()->route('home')->with('successMsg', "Account created successfully");
            
        }

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
         $value = $this->_LoginUser($user);

         if($value == "new account"){
            return redirect()->route('home')->with('successMsg', "Account created successfully");
            
        }

        //returning home after login
        return redirect()->route('home');
     }


     protected function _LoginUser($info){

        $user = User::where('email', '=', $info->email)->first();

        if(!$user){
            $user = new User();
            $user->name = $info->name;

            if($user->name == null){
                $user->name = $info->email;
            }
            
            $user->email = $info->email;
            $user->provider_id = $info->id;
            $user->avatar = $info->avatar;
            
            $user->save();
            Auth::login($user);
            return "new account";
            
        }

        Auth::login($user);
        return "old account";
     }


     
}
