<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Privacy Settings') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("What info do you want visible on your signed documents?") }}
        </p>
    </header>

    <form method="post" action="{{ route('settings.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')
        
        <input name="name" type="text" value="{{ $user->name }}" required hidden />
        <input name="email" type="email" value="{{ $user->email }}" required hidden />
        <input name="privacy_settings" type="text" value="1" hidden />
        <div class="flex flex-row space-x-2">
            {{-- checkbox  --}}
            <label class="switch">
                <input type="hidden" value="0" name="privacy_email" />
                <input id="privacy_email" class="reg-switch" type="checkbox" @if($user->privacy_email) checked @endif value="1" name="privacy_email" />
                <span class="slider round"></span>
            </label>
            <x-input-label for="privacy_email" :value="__('Email')" />
        </div>
        <div class="flex flex-row space-x-2">
            {{-- checkbox  --}}
            <label class="switch">
                <input type="hidden" value="0" name="privacy_name" />
                <input id="privacy_name" class="reg-switch" type="checkbox" @if($user->privacy_name) checked @endif value="1" name="privacy_name" />
                <span class="slider round"></span>
            </label>
            <x-input-label for="privacy_name" :value="__('Name')" />
        </div>
        <div class="flex flex-row space-x-2">
            {{-- checkbox  --}}
            <label class="switch">
                <input type="hidden" value="0" name="privacy_address" />
                <input id="privacy_address" class="reg-switch" type="checkbox" @if($user->privacy_address) checked @endif value="1" name="privacy_address" />
                <span class="slider round"></span>
            </label>
            <x-input-label for="privacy_address" :value="__('Address')" />
        </div>
        <div class="flex flex-row space-x-2">
            {{-- checkbox  --}}
            <label class="switch">
                <input type="hidden" value="0" name="privacy_phone" />
                <input id="privacy_phone" class="reg-switch" type="checkbox" @if($user->privacy_phone) checked @endif value="1" name="privacy_phone" />
                <span class="slider round"></span>
            </label>
            <x-input-label for="privacy_phone" :value="__('Phone')" />
        </div>
        <div class="flex flex-row space-x-2">
            {{-- checkbox  --}}
            <label class="switch">
                <input type="hidden" value="0" name="privacy_gender" />
                <input id="privacy_gender" class="reg-switch" type="checkbox" @if($user->privacy_gender) checked @endif value="1" name="privacy_gender" />
                <span class="slider round"></span>
            </label>
            <x-input-label for="privacy_gender" :value="__('Gender')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Update') }}</x-primary-button>

            @if (session('privacy_update_status') === 'privacy-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    {{-- x-transition
                    x-init="setTimeout(() => show = false, 2000)" --}}
                    class="text-sm text-green-600 dark:text-green-400"
                >{{ __('Privacy Updated Successfully.') }}</p>
            @endif
        </div>
    </form>
</section>
