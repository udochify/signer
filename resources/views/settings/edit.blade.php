<x-app-layout :page="'settings'">
    <x-slot name="styles">
        <link href="{{ asset('css/toggle-switch.css') }}" rel="stylesheet" />
    </x-slot>
    <div class="py-12">
        <div class="w-fit sm:max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('settings.partials.sign-settings-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('settings.partials.privacy-settings-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>