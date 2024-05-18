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
        {{ $styles ?? "" }}

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
    <body x-data="{ open: false }" class="font-sans antialiased dark:bg-black dark:text-white/50 text-[#171717]">
        <div class="absolute w-screen flex flex-row h-16 bg-[#E5EBF1] z-50 border-solid border-b border-gray-300">
            <div class="hidden sm:flex flex-col items-center h-full w-64">
                <div class="flex flex-row h-full items-center space-x-2">
                    <img class="w-[34px] h-[34px]" src="images/icons/avatar.png" />
                    <div class="flex flex-col">
                        <div class="max-w-[184px] overflow-clip">
                            <p class="text-lg capitalize whitespace-nowrap" title="{{ Auth::user()->name }}">{{ Auth::user()->name }}</p>
                        </div>
                        <div class="flex flex-row">
                            <p class="text-xs">Personalised profile</p>
                            <x-dropdown align="left" width="48">
                                <x-slot name="trigger">
                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </x-slot>

                                <x-slot name="content">
                                    <x-dropdown-link :href="route('profile.edit')">
                                        {{ __('Profile') }}
                                    </x-dropdown-link>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    </div>
                </div>
            </div>
            <div class="h-full">
                <div class="flex flex-row space-x-4 h-full w-fit items-center px-10 font-[arial]">
                    <a href="/">
                        <p class="font-bold text-xl text-[#000000]">
                            Secure<span class="text-[#007AFF]">Sign</span>
                        </p>
                    </a>
                    <img class="w-4 h-[18px]" src="images/icons/arrow-4-right.png" />
                    <p class="font-sans text-lg font-thin capitalize">{{ $page ?? "" }}</p>
                </div>
                <div class="absolute top-0 right-0 flex flex-row h-full w-fit items-center px-10 md:px-20 gap-x-4 md:gap-x-6">
                    
                </div>
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
        <div :class="{'block': open, 'hidden': ! open}" class="relative hidden sm:hidden top-16 border-b border-gray-300 border-solid">
            <div class="border-t border-gray-200 dark:border-gray-600">
                <x-responsive-nav-link :href="route('dashboard')" :active="true">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('dashboard')">
                    {{ __('Doc formats') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('settings')">
                    {{ __('Settings') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('dashboard')">
                    {{ __('Notification') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
        <div class="relative flex flex-row top-16 w-screen min-h-[calc(100vh-64px)] bg-white">
            <div class="hidden sm:flex flex-col items-center w-64 min-h-screen bg-[#E5EBF1] border-solid border-r border-gray-300">
                <a href="/">
                    <div class="flex flex-row items-center space-x-3 w-44 mt-10 mb-20 rounded-[5px] text-[#007AFF] text-normal pl-2 py-1 border border-[#007AFF] border-solid hover:border-blue-300">
                        <img class="w-[21px] h-[24px]" src="images/icons/vector.png" />
                        <p class="">View Doc formats</p>
                    </div>
                </a>
                <div class="flex flex-col items-center space-y-6">
                    <a href="{{ route('dashboard') }}">
                        <div class="flex flex-row items-center space-x-3 w-44 bg-[#007AFF] rounded-[5px] text-white text-normal pl-2 py-1 hover:border hover:border-blue-300 hover:border-solid">
                            <img class="w-6 h-6" src="images/icons/clarity_home-solid.png" />
                            <p class="">Dashboard</p>
                        </div>
                    </a>
                    <a href="{{ route('settings') }}">
                        <div class="flex flex-row items-center space-x-3 w-44 rounded-[4px] text-normal pl-2 py-1 hover:border hover:border-blue-300 hover:border-solid">
                            <img class="w-6 h-6" src="images/icons/material-symbols_settings.png" />
                            <p class="">Settings</p>
                        </div>
                    </a>
                    <a href="/">
                        <div class="flex flex-row items-center space-x-3 w-44 rounded-[4px] text-normal pl-2 py-1 hover:border hover:border-blue-300 hover:border-solid">
                            <img class="w-6 h-6" src="images/icons/mingcute_notification-fill.png" />
                            <p class="">Notification</p>
                        </div>
                    </a>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <div onclick="event.preventDefault(); this.closest('form').submit();" class="flex flex-row items-center space-x-3 w-44 mt-32 rounded-[4px] text-normal text-[#F65A5A] pl-2 py-1 hover:border hover:border-[#F65A5A] hover:border-solid cursor-pointer">
                        <img class="w-6 h-6" src="images/icons/tdesign_logout.png" />
                        <p class="">Log out</p>
                    </div>
                </form>
            </div>
            {{ $slot }}
        </div>
    </body>
</html>
