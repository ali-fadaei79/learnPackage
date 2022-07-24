<?php

namespace parsaco\authtestpackage\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use function view;

class Login extends Component
{
    public $username = '';
    public $password = '';

    protected $rules = [
        'username' => ['required','exists:users,username'],
        'password' => 'required'
    ];

    protected $messages = [
        'username.required' => 'فیلد نام کاربری نمیتواند خالی باشد.',
        'username.exists' => 'نام کاربری موجود نمیباشد.',
        'password.required' => 'فیلد رمز عبور نمیتواند خالی باشد.',
    ];

    public function updated($fields){

        $this->validateOnly($fields);
    }

    public function storeLogin(){
        $dataValidated = $this->validate();
        $user = User::query()->where('username',$dataValidated['username'])->first();
        if (Hash::check($dataValidated['password'],$user->password)){
            auth()->login($user);
            return redirect()->to('/');
        }

        $this->addError('incorrectPassword' , 'رمز عبور صحیح نمیباشد');
//        return redirect()->route('user.createLogin');
    }

    public function render()
    {
        return view('authTest::livewire.login');
    }
}
