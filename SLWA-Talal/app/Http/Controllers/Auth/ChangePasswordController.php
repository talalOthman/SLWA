<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ChangePasswordController extends Controller
{



    public function __construct(){
        $this->middleware('auth');
    }



    public function index()
    {

        return view('auth.passwords.change');

    }

    public function changePassword(Request $req){

        $this->validate($req,[
            'currentpassword' => 'required',
            'password' => 'required|confirmed'
        ]);

        $hashedPassword = Auth::user()->password;

        if(Hash::check($req->currentpassword, $hashedPassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($req->password);
            $user->save();
            

            return redirect()->route('home')->with('successMsg', "Password is changed successfully");
        }else{
            return redirect()->back()->with('errorMsg', "Current Password is invalid");
        }
        
    }
}
