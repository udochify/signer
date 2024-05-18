<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Vite -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            .active-vs {
                border-width: 2px;
                border-color: #007AFF;
            }
        </style>
    </head>
    <body x-data="{ open: false }" class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="absolute w-screen h-16 bg-white z-50">
            <div class="flex h-full w-fit items-center px-10 md:px-20">
                <p class="font-[arial] font-bold text-xl text-[#000000]">
                    Secure<span class="text-[#007AFF]">Sign</span>
                </p>
            </div>
            <div class="hidden absolute top-0 right-0 sm:flex flex-row h-full w-fit items-center px-10 md:px-20 gap-x-4 md:gap-x-6">
                <div class="border border-solid border-white hover:border-blue-200 cursor-pointer px-3 py-1 rounded-md">
                    <p class="font-[arial] font-light text-normal md:text-lg text-[#171717]">Features</p>
                </div>
                <div class="border border-solid border-white hover:border-blue-200 cursor-pointer px-3 py-1 rounded-md">
                    <p class="font-[arial] font-light text-normal md:text-lg text-[#171717]">Pricing</p>
                </div>
                <div class="border border-solid border-white hover:border-blue-200 cursor-pointer px-3 py-1 rounded-md">
                    <p class="font-[arial] font-light text-normal md:text-lg text-[#171717]">About</p>
                </div>
                <a href="{{ route('login') }}">
                    <div class="active-vs border border-solid border-white hover:bg-[#007AFF] hover:text-white cursor-pointer px-3 py-1 rounded-md">
                        <p class="font-[arial] font-light text-normal md:text-lg">Sign In</p>
                    </div>
                </a>
            </div>
            <!-- Hamburger -->
            <div class=" absolute top-3 right-8 -mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
        <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="relative hidden sm:hidden top-16">
            <div class="border-t border-gray-200 dark:border-gray-600">
                <x-responsive-nav-link :href="route('login')" :active="true">
                    {{ __('Sign In') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('dashboard')">
                    {{ __('Features') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('dashboard')">
                    {{ __('Pricing') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('dashboard')">
                    {{ __('About') }}
                </x-responsive-nav-link>
            </div>
        </div>
        <div class="relative top-16 w-screen min-h-[calc(100vh-64px)] bg-[#E5EBF1]">
            <div class="flex flex-col items-center h-fit space-y-14 pt-16">
                <div class="flex flex-col items-center space-y-5">
                    <p class="font-[arial] font-bold text-4xl sm:text-5xl text-[#171717] text-nowrap">Welcome to <span class="text-[#000000]">Secure</span><span class="text-[#007AFF]">Sign</span></p>
                    <p class="font-[arial] font-bold text-2xl text-[#171717]">Your Trusted Digital Signature Solution.</p>
                </div>
                <div class="flex flex-col items-center">
                    <p class="font-[arial] font-normal text-lg text-[#171717]">Secure, sign and share PDFs online.</p>
                    <p class="font-[arial] font-normal text-lg text-[#171717]">It's seamless, fast and secured.</p>
                </div>
                <div class="p-12">
                    <a href="{{ route('register') }}">
                        <div class="active-vs border border-solid border-white hover:border-blue-100 cursor-pointer px-6 py-3 rounded-md bg-[#007AFF]">
                            <p class="font-[arial] font-[600] text-2xl text-white">Signup To Get Started</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>
