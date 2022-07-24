<?php

namespace parsaco\authtestpackage\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use function view;

class Register extends Component
{
    public $name = '';
    public $lastname = '';
    public $username = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';

    protected $rules = [
        'name' => 'required',
        'lastname' => 'required',
        'username' => ['required','unique:users,username'],
        'email' => ['required','email','unique:users,email'],
        'password' => ['required','confirmed']
    ];

    protected $messages = [
        'name.required' => 'فیلد نام نمیتواند خالی باشد.',
        'lastname.required' => 'فیلد نام خانوادگی نمیتواند خالی باشد.',
        'username.required' => 'فیلد نام کاربری نمیتواند خالی باشد.',
        'username.unique' => 'نام کاربری از قبل موجود است.',
        'email.required' => 'فیلد ایمیل نمیتواند خالی باشد.',
        'email.email' => 'فرمت ایمیل وارد شده نا معتبر است.',
        'email.unique' => 'ایمیل از قبل موجود است.',
        'password.required' => 'فیلد رمز عبور نمیتواند خالی باشد.',
        'password.confirmed' => 'رمز عبور وارد شده یکسان نیست.',
    ];


    public function updated($fields){

        $this->validateOnly($fields);
    }

    public function storeRegister(){

        $this->validate();

        $user = User::query()->create([
            'name' => $this->name,
            'lastname' => $this->lastname,
            'username' => $this->username,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);

        auth()->login($user);

        return redirect()->to('/');
    }

    public function render()
    {
        return view('authTest::livewire.register');
    }
}
