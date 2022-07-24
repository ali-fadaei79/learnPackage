<div class="register-container d-flex justify-content-center align-items-center">
    <div class="register-form">
        <div class="register-title">
            <h2>ایجاد حساب</h2>
            <p>قبلا ثبت نام کرده اید؟ <a href="{{ route('user.createLogin') }}">ورود</a></p>
        </div>
        <div class="register-content p-3">
            <form wire:submit.prevent="storeRegister">
                <input wire:model="username" class="form-control my-2 py-2" name="username" type="text" placeholder="نام کاربری">
                @error('username') <span class="text-danger">{{ $message }}</span> @enderror
                <div class="row">
                    <div class="col-6 right-from">
                        <input wire:model="name" class="form-control py-2" name="name" type="text" placeholder="نام">
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-6 left-form">
                        <input wire:model="lastname" class="form-control py-2" name="lastname" type="text" placeholder="نام خانوادگی">
                        @error('lastname') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>


                <input wire:model="email" class="form-control my-2 py-2" name="email" type="text" placeholder="ایمیل">
                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                <input wire:model="password" class="form-control my-2 py-2" name="password" type="password" placeholder="کلمه عبور">
                @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                <input wire:model="password_confirmation" class="form-control my-2 py-2" name="password_confirmation" type="password" placeholder="تایید کلمه عبور">
                <input class="btn btn-lg btn-dark w-100 fs-6" type="submit" value="ثبت نام">
            </form>
        </div>
    </div>
</div>
