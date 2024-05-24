@props(['page'])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Vite -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            .active-vs {
                border-width: 2px;
                border-color: #007AFF;
            }

            .login-login, .signup-signup {
                background-color: #007AFF;
            }

            .login-login p, .signup-signup p {
                color: #FFFFFF;
            }
        </style>
    </head>
    <body x-data="{ open: false }" class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="absolute w-screen h-16 bg-[#E5EBF1] z-50">
            <div class="flex h-full w-fit items-center px-10 md:px-20">
                <a href="/">
                    <p class="font-[arial] font-bold text-xl text-[#000000]">
                        Secure<span class="text-[#007AFF]">Sign</span>
                    </p>
                </a>
            </div>
            <div class="absolute top-0 right-0 flex flex-row h-full w-fit items-center px-10 md:px-20 gap-x-4 md:gap-x-6">
                <a href="{{ route('login') }}">
                    <div class="{{ $page ?? '' }}-login active-vs border border-solid text-[#171717] hover:bg-[#007AFF] hover:text-white cursor-pointer px-3 py-1 rounded-md">
                        <p class="font-[arial] font-light text-normal md:text-lg">Sign In</p>
                    </div>
                </a>
                <a href="{{ route('register') }}">
                    <div class="{{ $page ?? ''}}-signup active-vs border border-solid text-[#171717] hover:bg-[#007AFF] hover:text-white cursor-pointer px-3 py-1 rounded-md">
                        <p class="font-[arial] font-light text-normal md:text-lg">Sign Up</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="relative top-16 w-screen min-h-[calc(100vh-64px)] bg-white">
            <div class="flex flex-col items-center h-fit space-y-14 pt-16 pb-10">
                <div class="flex flex-col items-center font-[arial] font-normal text-lg sm:text-xl md:text-2xl text-[#171717]">
                    @if($page == 'signup')
                    <p>Create an Account with <span class="text-[#000000] font-bold">Secure<span class="text-[#007AFF]">Sign</span></span></p>
                    <p>today to sign and</p>
                    <p>verify your files using Blockchain Technology</p>
                    @else
                    <p>Login to <span class="text-[#000000] font-bold">Secure<span class="text-[#007AFF]">Sign</span></span> to sign and</p>
                    <p>verify documents with Blockchain Technology</p>
                    @endif
                </div>
                <div class="flex flex-col items-center w-[410px] sm:w-[460px] h-fit bg-[#E5EBF1] rounded-3xl p-2">
                    <div class="w-[90%] h-24 border-b border-gray-300 py-10 text-lg">
                        @if($page == 'signup')
                        <p>Fill in your details below to create an account</p>
                        @else
                        <p>Fill in your details access your account</p>
                        @endif
                    </div>
                    <div class="w-[90%] h-fit py-5">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
