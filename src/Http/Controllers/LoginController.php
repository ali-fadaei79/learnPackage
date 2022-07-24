<?php

namespace parsaco\authtestpackage\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends BaseController
{
    public function create(){
        return view('authTest::login');
    }

    public function store(Request $request){
        $user = User::query()->where('email',$request->get('email'))->first();
        if ($user){
            if (Hash::check($request->get('password'),$user->password)){
                return "login done";
            }
        }
        return "password is invalid";
        return redirect()->back()->withErrors(['message' => 'password is invalid']);
    }
}
