<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;



class UserController extends Controller
{
    


    public function __construct()
    {
        $this->middleware('auth');
    }


    

  


    
    public function profile(){
        return view('profile', array('user' => Auth::user()));
    }

    public function updateUserData(Request $req){

        // Get current user
        /*
        $userId = Auth::id();
        $user = User::findOrFail($userId);
        
        $avatar = $data['avatar'];
        $extension = $avatar->getClientOriginalExtension();
        $avatar_name  = time() . '.' . $extension;
        $avatar->move(base_path('public/images/avatars/'), $avatar_name);
        */

        $validator = Validator::make($req->all(), [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'currentpassword' => ['string', 'min:8'],
            'newpassword' => ['string', 'min:8', 'confirmed'],
        ]);

        $user = Auth::user();
        $avatar_name = null;
        

        if($req->hasFile('avatar')){
            $avatar = $req->file('avatar');
            $extension = $avatar->getClientOriginalExtension();
            $avatar_name  = time() . '.' . $extension;
            $avatar->move(base_path('public/images/avatars/'), $avatar_name);
            $user->changePicture = "true";
        }

       

            

            if($avatar_name !== null){
            $user->avatar = $avatar_name;
            }

            if($req->name == null){
                return redirect()->back()->with('errorMsg', "Full name can't be empty");
            }

            $user->name = $req->name;
            $user->email = $req->email;
            $user->username = $req->username;
            
            
            

            $user->save();
        

        return view('profile', array('user' => Auth::user()));
    }


    


}
