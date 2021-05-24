<?php

namespace App\Http\Controllers;

use App\Rules\MatchOldPassword;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //menampilkan vieww change password
    public function changePasswordView(){
        return view('change-password');
    }

    //fungsi untuk mengganti password
    public function changePassword(Request $request){
        $request->validate([
            'oldpassword' => ['required',new MatchOldPassword],
            'newpassword' => 'required',
            'confirmpassword'=>'required|same:newpassword'
        ]);
        
        User::find(Auth::user()->id)->update(['password' => Hash::make($request->newpassword)]);
            
        return redirect('/');
    }
}
