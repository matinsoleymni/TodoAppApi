@extends("layouts.master")

@section("title" , "ورود")

@section("content")
<div class="min-h-screen bg-base-200 flex items-center">
    <div class="card mx-auto w-full max-w-md shadow-xl bg-base-100">
        <div class="card-body">
            <h2 class="card-title text-2xl font-bold text-center block">ورود به حساب کاربری</h2>
            
            <form method="POST" action="{{ route('login.post') }}">
                @csrf
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">ایمیل</span>
                    </label>
                    <input type="email" name="email" placeholder="example@mail.com" class="input input-bordered" required />
                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">رمز عبور</span>
                    </label>
                    <input name="password" type="password" placeholder="رمز عبور خود را وارد کنید" class="input input-bordered" required />
                    @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-control mt-6">
                    <button class="btn btn-primary">ورود</button>
                </div>

                <div class="divider">یا</div>

                <div class="text-center mt-4">
                    <span>حساب کاربری ندارید؟</span>
                    <a href="/register" class="link link-primary">ثبت‌نام کنید</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection