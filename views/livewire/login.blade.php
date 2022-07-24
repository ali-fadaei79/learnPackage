<div class="register-container d-flex flex-column justify-content-center align-items-center">
    <div class="register-form">
        <div class="register-title">
            <h2>ورود به حساب</h2>
            <p>حساب کاربری ندارید؟ <a href="{{ route('user.createRegister') }}">ایجاد حساب</a></p>
        </div>
        <div class="register-content p-3">
            <form wire:submit.prevent="storeLogin">
                <input wire:model="username" class="form-control my-2 py-2" name="username" type="text" placeholder="نام کاربری">
                @error('username') <span class="text-danger">{{ $message }}</span> @enderror
                <input wire:model="password" class="form-control my-2 py-2" name="password" type="password" placeholder="کلمه عبور">
                @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                <input class="btn btn-lg btn-dark w-100 fs-6" type="submit" value="ورود">
            </form>
        </div>
    </div>
    @error('incorrectPassword')
        <div class="alert alert-danger mt-3" role="alert">
            {{ $message }}
        </div>
    @enderror
</div>
