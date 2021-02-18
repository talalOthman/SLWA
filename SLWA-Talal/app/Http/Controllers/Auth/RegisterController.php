<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        
        $avatar = $data['avatar'];
        $extension = $avatar->getClientOriginalExtension();
        $avatar_name  = time() . '.' . $extension;
        $avatar->move(base_path('public/images/avatars/'), $avatar_name);

        $user = new User();
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = Hash::make($data['password']);
            $user->avatar = $avatar_name;
            $user->save();

            return $user;


            
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
                    ? new JsonResponse([], 201)
                    : redirect($this->redirectPath())->with('successMsg', "Account created successfully");
    }

    // Google register
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Google call back
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();

        $this->_RegisterUser($user);

        //returning home after register
        return redirect()->route('home');
    }


    

     // Github register
     public function redirectToGithub()
     {
         return Socialite::driver('github')->redirect();
     }
 
     // Github call back
     public function handleGithubCallback()
     {
         $user = Socialite::driver('github')->user();
 
         $this->_RegisterUser($user);

         //returning home after login
         return redirect()->route('home');
     }



     protected function _RegisterUser($info){

    

        
            $user = new User();
            $user->name = $info->name;
            $user->email = $info->email;
            $user->provider_id = $info->id;
            $user->avatar = $info->avatar;
            
            $user->save();
            

        Auth::login($user);
     }
}

     

    

