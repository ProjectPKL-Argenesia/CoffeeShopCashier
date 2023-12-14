<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Register</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <section class="grid w-full h-screen bg-gray-100 place-items-center">
        <div
            class="bg-white rounded-2xl shadow-2xl w-[90vw] lg:w-[80vw] xl:w-[65vw] 2xl:w-[60vw] h-[500px] md:h-[460px] xl:h-[500px] 2xl:h-[600px] grid grid-cols-1 md:grid-cols-2 overflow-hidden">
            <div class="grid w-full h-full grid-cols-1 px-10 py-4 bg-white">
                <div class="text-center">
                    <h1 class="text-2xl font-semibold text-black capitalize">Selamat Datang !</h1>
                    <p class="text-black/80 text-[15px]">Hello | Silahkan masukan data anda</p>
                </div>
                <form action="{{ route('register') }}" method="POST">
                    <div>
                        @csrf
                        <div class="grid items-start w-full grid-cols-1 gap-y-3">
                            <div class="grid grid-cols-1">
                                <label class="text-base text-black/80 " for="name">Username</label>
                                <input type="text" name="name" id="name" required autofocus
                                    autocomplete="name" placeholder="Masukkan username"
                                    class="w-full rounded-md focus:outline-none focus:ring-0">
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <div class="grid grid-cols-1">
                                <label class="text-base text-black/80" for="email">Email</label>
                                <input type="email" name="email" id="email" required autocomplete="username"
                                    placeholder="contoh@gmail.com"
                                    class="w-full rounded-md focus:outline-none focus:ring-0">
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <div class="grid grid-cols-1">
                                <label class="text-base text-black/80" for="password">Password</label>
                                <input type="password" name="password" id="password" required
                                    autocomplete="new-password" placeholder="********"
                                    class="w-full rounded-md focus:outline-none focus:ring-0">
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <div class="grid grid-cols-1">
                                <label class="text-base text-black/80" for="password_confirmation">Konfirmasi
                                    Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" required
                                    autocomplete="new-password" placeholder="********"
                                    class="w-full rounded-md focus:outline-none focus:ring-0">
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>

                            <div class="grid grid-cols-1">
                                <button type="submit"
                                    class="bg-[#1F2937] w-full rounded-md text-white py-2 hover:scale-105 hover:bg-gray-900 transition-all duration-300">Daftar</button>
                            </div>

                            <div class="flex items-center justify-between text-xs">
                                <p class="text-gray-800">kamu sudah punya akun ?</p>
                                @if (Route::has('register'))
                                    <a class="py-2 px-5 bg-white border text-[#000000] rounded-md shadow-md hover:scale-110 duration-300"
                                        href="{{ route('login') }}">Masuk
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="hidden w-full h-full bg-white md:block">
                <img src="{{ asset('assets/images/background.jpg') }}" alt="gambar" class="w-full h-full ">
            </div>
        </div>
    </section>
</body>

</html>
