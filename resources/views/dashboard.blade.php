<x-app-layout :page="'dashboard'">
    <!-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div> -->
    <div class="flex flex-col items-center w-full">
        <img class="w-[100px] h-[100px] mt-6" src="images/dashboard-home.png" />
        <p class="font-[arial] font-normal text-xl sm:text-2xl text-nowrap mt-4">Welcome to your</p>
        <p class="font-[arial] font-bold text-3xl sm:text-4xl text-nowrap mt-2"><span class="text-[#000000]">Secure</span><span class="text-[#007AFF]">Sign</span> dashboard</p>
        <div class="flex flex-col w-[80%] md:w-[60%]"> 
            <p class="font-[arial] font-normal text-lg sm:text-xl text-nowrap mt-6">What would you like to do:</p>
            <div class="flex flex-col w-full mt-2 space-y-6 text-lg">
                <div class="relative flex flex-row items-center w-full h-[80px] bg-[#E5EBF1] rounded-lg pl-6 sm:pl-14">
                    <img class="w-[28px] h-[36px] mr-4" src="images/icons/import-icon.png" />
                    <p>Import Online Document</p>
                    <a class="absolute right-6" href="/">
                        <img class="w-[45px] h-[45px]" src="images/icons/arrow-right.png" />
                    </a>
                </div>
                <div class="relative flex flex-row items-center w-full h-[80px] bg-[#E5EBF1] rounded-lg pl-6 sm:pl-14">
                    <img class="w-[36px] h-[36px] mr-4" src="images/icons/verify-icon.png" />
                    <p>Verify Document</p>
                    <a class="absolute right-6" href="/">
                        <img class="w-[45px] h-[45px]" src="images/icons/arrow-right.png" />
                    </a>
                </div>
                <div class="relative flex flex-row items-center w-full h-[80px] bg-[#E5EBF1] rounded-lg pl-6 sm:pl-14">
                    <img class="w-[36px] h-[36px] mr-4" src="images/icons/sign-icon.png" />
                    <p>Sign Local Document</p>
                    <a class="absolute right-6" href="/">
                        <img class="w-[30px] sm:w-[45px] h-[30px] sm:h-[45px]" src="images/icons/arrow-right.png" />
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>