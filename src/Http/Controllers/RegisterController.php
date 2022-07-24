<?php

namespace parsaco\authtestpackage\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends BaseController
{
    public function create(){
        return view('authTest::register');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => ['required','email'],
            'password' => 'required'
        ]);

        $emailExists = User::query()->where('email',$request->get('email'))->exists();
        if(!$emailExists){
            User::query()->create([
                'name'=>$request->get('name'),
                'email'=>$request->get('email'),
                'password'=>bcrypt($request->get('password'))
            ]);

            return redirect('/');
        }else{
            return "email already exists";
        }
    }
}
