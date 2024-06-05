<x-app-layout :page="'verify'">
    <x-slot name="styles">
        <link href="{{ asset('css/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" />
    </x-slot>
    <x-slot name="scripts">
        <script src="{{ asset('js/jquery-3.6.3.min.js') }}" defer></script>
        <script src="{{ asset('js/perfect-scrollbar/perfect-scrollbar.min.js') }}" defer></script>
        <script src="{{ asset('js/udo-main.js') }}" defer></script>
    </x-slot>
    <div class="flex flex-col items-center w-full mb-14">
        <img class="w-[100px] h-[100px] mt-6" src="images/verify.png" />
        <p class="font-[arial] font-normal text-xl sm:text-2xl text-nowrap mt-4">Verify your files here</p>
        {{-- <p class="font-[arial] font-bold text-3xl sm:text-4xl text-nowrap mt-2"><span class="text-[#000000]">Secure</span><span class="text-[#007AFF]">Sign</span> dashboard</p> --}}
        <div class="flex flex-col w-[80%] md:w-[60%]"> 
            <p class="font-[arial] font-normal text-lg sm:text-xl text-nowrap mt-6">Select a document to sign:</p>
            <div class="flex flex-col w-full mt-2 space-y-6 text-lg">
                @include("pages.partials.verify-form")
            </div>
        </div>
    </div>
</x-app-layout>