@extends("layouts.master")

@section("title" , "عضویت")

@section("content")
<div class="min-h-screen bg-base-200 flex items-center">
    <div class="card mx-auto w-full max-w-md shadow-xl bg-base-100">
        <div class="card-body">
            <h2 class="card-title text-2xl font-bold text-center block">ایجاد حساب کاربری</h2>
            
            <form method="POST" action="{{ route('register.post') }}">
                @csrf
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">نام و نام خانوادگی</span>
                    </label>
                    <input name="name" type="text" placeholder="نام خود را وارد کنید" class="input input-bordered" value="{{old("name")}}" required />
                    @error("name")
                        <p class="text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-control">
                    <label class="label">
                        <span class="label-text">ایمیل</span>
                    </label>
                    <input name="email" type="email" placeholder="example@mail.com" class="input input-bordered" value="{{old("email")}}" required />
                    @error("email")
                        <p class="text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">رمز عبور</span>
                    </label>
                    <input name="password" type="password" placeholder="رمز عبور خود را وارد کنید" class="input input-bordered" required />
                    @error("password")
                        <p class="text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="form-control mt-6">
                    <button class="btn btn-primary">ثبت‌نام</button>
                </div>

                <div class="divider">یا</div>

                <div class="text-center mt-4">
                    <span>قبلاً ثبت‌نام کرده‌اید؟</span>
                    <a href="/login" class="link link-primary">وارد شوید</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection