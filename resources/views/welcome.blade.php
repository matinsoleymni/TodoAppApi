<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zmat24 - Todo API - سرویس مدیریت تسک‌ها</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.2/dist/full.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/Vazirmatn-font-face.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>
<body class="font-[vazirmatn] bg-gradient-to-br from-base-100 to-base-200">
    @if(session()->has('message'))
        <div class="alert alert-success fixed top-24 left-4 right-4 mx-auto max-w-md z-50 shadow-lg" id="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{ session('message') }}</span>
            <button onclick="closeAlert()" class="btn btn-circle btn-xs">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    @endif

    <script>
        function closeAlert() {
            document.getElementById('alert').style.display = 'none';
        }

        if (document.getElementById('alert')) {
            setTimeout(() => {
                closeAlert();
            }, 5000);
        }
    </script>

    <nav class="navbar bg-base-100/50 backdrop-blur-lg fixed top-0 z-50">
        <div class="container mx-auto">
            <div class="flex-1">
                <a class="text-2xl font-bold bg-gradient-to-r from-primary to-secondary bg-clip-text text-transparent">Todo API</a>
            </div>
            <div class="flex-none gap-4">
                <a href="/login" class="btn btn-ghost btn-sm">ورود</a>
                <a href="/register" class="btn btn-primary btn-sm">ثبت‌نام رایگان</a>
            </div>
        </div>
    </nav>

    <!-- بخش هیرو -->
    <section class="min-h-screen pt-24 pb-16 flex items-center relative overflow-hidden">
        <div class="absolute inset-0 bg-grid-pattern"></div>
        <div class="container mx-auto px-4 relative">
            <div class="max-w-5xl mx-auto text-center" data-aos="fade-up">
                <span class="px-4 py-2 rounded-full bg-primary/10 text-primary inline-block mb-6">
                    نسخه ۱.۰.۰ منتشر شد! 🎉
                </span>
                <h1 class="text-6xl font-black mb-8 bg-gradient-to-r from-primary to-secondary bg-clip-text text-transparent">
                    API قدرتمند برای اپلیکیشن Todo شما
                </h1>
                <p class="text-xl mb-12 text-base-content/80 leading-relaxed">
                    با استفاده از API ما، به‌راحتی می‌توانید یک اپلیکیشن مدیریت تسک بسازید. 
                    ما تمام نیازهای بک‌اند شما را پوشش می‌دهیم.
                </p>
                <div class="flex gap-4 justify-center">
                    <a href="/register" class="btn btn-primary btn-lg">
                        شروع رایگان
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="M10 22L0 12L10 2l1.775 1.775L3.55 12l8.225 8.225z"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- بخش ویژگی‌ها -->
    <section class="py-24 bg-base-100">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl font-bold mb-4">ویژگی‌های API ما</h2>
                <p class="text-base-content/70">همه آنچه برای ساخت یک اپلیکیشن حرفه‌ای نیاز دارید</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="card bg-base-200 hover:shadow-xl transition-all duration-300" data-aos="fade-up" data-aos-delay="100">
                    <div class="card-body">
                        <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                        <h3 class="card-title">احراز هویت امن</h3>
                        <p class="text-base-content/70">سیستم احراز هویت JWT با امنیت بالا و قابلیت مدیریت توکن</p>
                    </div>
                </div>
                <div class="card bg-base-200 hover:shadow-xl transition-all duration-300" data-aos="fade-up" data-aos-delay="200">
                    <div class="card-body">
                        <div class="w-12 h-12 bg-secondary/10 rounded-xl flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <h3 class="card-title">مستندات کامل</h3>
                        <p class="text-base-content/70">مستندات API با جزئیات کامل و مثال‌های عملی</p>
                    </div>
                </div>
                <div class="card bg-base-200 hover:shadow-xl transition-all duration-300" data-aos="fade-up" data-aos-delay="300">
                    <div class="card-body">
                        <div class="w-12 h-12 bg-accent/10 rounded-xl flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <h3 class="card-title">عملکرد سریع</h3>
                        <p class="text-base-content/70">پاسخ‌دهی سریع و بهینه‌سازی شده برای حجم بالای درخواست</p>
                    </div>
                </div>
                <div class="card bg-base-200 hover:shadow-xl transition-all duration-300" data-aos="fade-up" data-aos-delay="400">
                    <div class="card-body">
                        <div class="w-12 h-12 bg-success/10 rounded-xl flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h3 class="card-title">کاملاً رایگان</h3>
                        <p class="text-base-content/70">این API به صورت اپن سورس منتشر شده و استفاده از آن رایگان است</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- بخش اسپانسرها -->
    <section class="py-24 bg-base-200/50 backdrop-blur-sm">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl font-bold mb-4">اسپانسر ما</h2>
                <p class="text-base-content/70">از حمایت‌های Klaris سپاسگزاریم</p>
            </div>
            <div class="flex justify-center items-center" data-aos="zoom-in">
                <a href="https://t.me/KlarisVPN" target="_blank" class="group">
                    <div class="bg-white p-12 rounded-2xl shadow-lg group-hover:shadow-2xl transition-all duration-300 transform group-hover:-translate-y-1">
                        <img src="{{ asset("klaris.jpg") }}" alt="Klaris Logo" class="h-40 object-contain">
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- بخش نمونه کد -->
    <section id="demo" class="py-24">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl font-bold mb-4">نمونه استفاده از API</h2>
                <p class="text-base-content/70">به همین سادگی شروع کنید</p>
            </div>
            <div dir="ltr" class="card bg-base-100 shadow-xl overflow-hidden" data-aos="fade-up">
                <div class="card-body p-0">
                    <div class="bg-neutral text-neutral-content p-4 flex items-center gap-2">
                        <div class="flex gap-1.5">
                            <div class="w-3 h-3 rounded-full bg-red-500"></div>
                            <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                            <div class="w-3 h-3 rounded-full bg-green-500"></div>
                        </div>
                        <span class="text-sm opacity-50">todo.js</span>
                    </div>
                    <pre dir="ltr" class="bg-neutral text-neutral-content p-6 text-sm overflow-x-auto"><code class="language-javascript">// دریافت لیست تسک‌ها
const url = 'http://127.0.0.1:8033/api/task';
const options = {
  method: 'GET',
  headers: {Accept: 'application/json', Authorization: 'USER Bearer 123' , Provider: 'YOUR PROVIDER TOKEN'}
};

try {
  const response = await fetch(url, options);
  const data = await response.json();
  console.log(data);
} catch (error) {
  console.error(error);
}

// ایجاد تسک جدید
const url = 'http://127.0.0.1:8033/api/task/create';
const options = {
  method: 'POST',
  headers: {
    'Content-Type': 'application/json',
    Accept: 'application/json',
    Authorization: 'Bearer 123'
  },
  body: '{"title":"string","description":"string","category_id":0,"flag":"low","deadline":"string"}'
};

try {
  const response = await fetch(url, options);
  const data = await response.json();
  console.log(data);
} catch (error) {
  console.error(error);
}
</code></pre>
                </div>
            </div>
        </div>
    </section>

    <!-- فوتر -->
    <footer class="footer footer-center p-10 bg-base-300 text-base-content">
        <div class="grid grid-flow-col gap-4">
            <a href="https://t.me/matinsoleymni" class="link link-hover">سازنده</a>
            <a href="https://t.me/LearnWithZmat24" class="link link-hover">تماس با ما</a>
            <a href="https://todo.zmat24.ir/docs/api" class="link link-hover">مستندات</a>
            <a href="https://github.com/matinsoleymni/TodoAppApi" class="link link-hover">گیت‌هاب</a>
        </div>
        <div>
            <div class="grid grid-flow-col gap-4">
                <a href="https://github.com/matinsoleymni/TodoAppApi" class="hover:text-primary cursor-pointer transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="M12.001 2c-5.525 0-10 4.475-10 10a9.99 9.99 0 0 0 6.837 9.488c.5.087.688-.213.688-.476c0-.237-.013-1.024-.013-1.862c-2.512.463-3.162-.612-3.362-1.175c-.113-.288-.6-1.175-1.025-1.413c-.35-.187-.85-.65-.013-.662c.788-.013 1.35.725 1.538 1.025c.9 1.512 2.337 1.087 2.912.825c.088-.65.35-1.087.638-1.337c-2.225-.25-4.55-1.113-4.55-4.938c0-1.088.387-1.987 1.025-2.687c-.1-.25-.45-1.275.1-2.65c0 0 .837-.263 2.75 1.024a9.3 9.3 0 0 1 2.5-.337c.85 0 1.7.112 2.5.337c1.913-1.3 2.75-1.024 2.75-1.024c.55 1.375.2 2.4.1 2.65c.637.7 1.025 1.587 1.025 2.687c0 3.838-2.337 4.688-4.562 4.938c.362.312.675.912.675 1.85c0 1.337-.013 2.412-.013 2.75c0 .262.188.574.688.474A10.02 10.02 0 0 0 22 12c0-5.525-4.475-10-10-10"/></svg>
                </a>
                <a href="https://t.me/LearnWithZmat24" class="hover:text-primary cursor-pointer transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="M12.077 2.001a10 10 0 0 1 7.077 3.014A10 10 0 0 1 22 12.167c-.678 13.192-19.556 13.08-20-.155a9.95 9.95 0 0 1 2.936-7.127a9.93 9.93 0 0 1 7.141-2.884m1.818 8.376s.016.01-.107.166a5 5 0 0 1-.489.512l-2.544 2.47c-.544.544-.533.878.1 1.334c.811.578 1.633 1.112 2.467 1.68c.833.567 1.855 1.4 2.278.177q.161-.49.244-1c.178-.98.356-1.958.511-2.948c.211-1.39.411-2.78.589-4.182c.089-.69-.278-1.001-.967-.834a5.6 5.6 0 0 0-.833.266l-7.256 3.06c-.688.288-1.377.6-2.055.934c-.167.088-.378.333-.367.5s.245.356.434.434c.466.189.966.322 1.455.478a2.38 2.38 0 0 0 2.222-.367a78 78 0 0 1 2.811-1.913c.445-.3.756-.467 1.19-.768c.222-.11.272-.162.317-.095z"/></svg>
                </a>
                <a href="https://www.youtube.com/@matinsoleymani24" class="hover:text-primary cursor-pointer transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="M23.498 6.186a3.02 3.02 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.02 3.02 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.02 3.02 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.02 3.02 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814M9.545 15.568V8.432L15.818 12z"/></svg>
                </a>
            </div>
        </div>
        <div>
            <p>Copyright © 2025 - تمامی حقوق محفوظ است - Zmat24</p>
        </div>
    </footer>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true
        });

        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'vazirmatn': ['Vazirmatn', 'sans-serif']
                    },
                    backgroundImage: {
                        'grid-pattern': "url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100' height='100' viewBox='0 0 100 100'%3E%3Cpath fill='%23000' fill-opacity='0.05' d='M96 95h4v1h-4v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9zm-1 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9z'/%3E%3C/svg%3E\")"
                    }
                }
            }
        }
    </script>
</body>
</html>