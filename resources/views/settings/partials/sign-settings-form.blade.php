<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Signature Settings') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Manage your signature") }}
        </p>
    </header>

    <form method="post" action="{{ route('settings.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')
        
        <input name="name" type="text" value="{{ $user->name }}" required hidden />
        <input name="email" type="email" value="{{ $user->email }}" required hidden />
        <input name="signature_settings" type="text" value="1" hidden />
        <div>
            <x-input-label for="signature" :value="__('Signature')" />
            <x-text-input id="signature" name="signature" type="text" class="mt-1 block w-full text-gray-400 text-sm" :value="$user->signature ?? 'You do not have a signature yet'" required disabled />
            <x-input-error class="mt-2" :messages="$errors->get('signature')" />
        </div>

        <div class="flex items-center gap-4">
        @if(!$user->signature)
            <x-primary-button>{{ __('create signature') }}</x-primary-button>
        @endif
        @if (session('signature_create_status') === 'signature-created')
            <div class="text-sm text-green-600 dark:text-green-400">
                <p>Signature Created Sucessfully.</p>
                <div class="flex flex-row items-center space-x-1">
                    <img src="images/icons/green-alert-100.png" class="w-3 h-3 -mt-[2px]" />
                    <p><strong>Alert:</strong>&nbsp;Copy key to a safe location as it is shown only once:</p>
                </div>
                <p class="text-[10px]">{{ session('key') }}</p>
            </div>
        @endif
        @if (session('signature_create_status') === 'no-signature')
            <p class="text-sm text-red-600 dark:text-red-400">
                {{ __('Create a signature first!') }}
            </p>
        @endif
        </div>
    </form>
</section>