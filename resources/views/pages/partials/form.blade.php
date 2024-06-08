<form id="file-form" class="w-full" method="POST" @if($page == 'sign') action="{{ route('files.sign') }}" @else action="{{ route('files.verify') }}" @endif enctype="multipart/form-data">
    @csrf

    <div>
        <x-input-label class="m-0 mr-2 p-0" for="type" :value="__('Type of Resource')" />
        <x-dropdown align="left" width="48">
            <x-slot name="trigger">
                <div id="chooser" class="flex flex-row space-x-2 items-center w-fit border rounded-[5px] border-gray-400 hover:border-gray-600 px-2 text-gray-700 hover:text-gray-900 cursor-pointer hover:drop-shadow bg-gradient-to-t from-gray-300 to-gray-100">
                    <p id="choice" class="drop-shadow-none hover:drop-shadow-none text-[16px]">Local Document</p>
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </div>
            </x-slot>

            <x-slot name="content">
                <x-dropdown-link :href="'javascript:void(0)'" class="choices" id="choice-local">
                    {{ __('Local Document') }}
                </x-dropdown-link>
                <x-dropdown-link :href="'javascript:void(0)'" class="choices" id="choice-link">
                    {{ __('External Link') }}
                </x-dropdown-link>
            </x-slot>
        </x-dropdown>
        <x-input-error :messages="$errors->get('type')" class="mt-2" />
    </div>

    <!-- Container -->
    <div id="input-container" class="mt-4">
        <x-input-label class="m-0 mr-2 p-0" for="file" :value="__('File') . ' (maximum size of 3MB)'" />
        <x-input-file id="file-input" type="file" name="file" class="form-control block m-0 p-0 w-[90%] bg-white file-input" accept=".txt,.pdf,.csv,.xlx,.xls,.xlsx,.doc,.docx,.html,.css,.js,.jpg,.jpeg,.png,.gif,.mp4,.avi,.3gp,.webm,.wav,.ogg,.mp3" required autofocus />
        <x-input-error :messages="$errors->get('file')" class="mt-2 file-error" />
    </div>

    @if($page == 'sign')
    <div class="flex flex-row items-center mt-2">
        <x-input-label for="key" :value="__('Private Key')" class="w-fit" />
        <x-text-input id="key" type="password" name="key" class="form-control block h-4 m-0 ml-2 p-0 px-1 w-[68%]" required />
    </div>
    <x-input-error :messages="$errors->get('key')" class="mt-2" />
    @endif

    <div class="flex flex-row items-center mt-4 space-x-3">
        @if($page == 'sign')
            <x-primary-button>
                {{ __('Sign') }}
            </x-primary-button>
            @if (session('signing_status') === 'signing-successful')
                <p class="text-sm text-green-600 dark:text-green-400">
                    {{ __('Document Signed successfully!') }}
                </p>
            @endif
        @else 
            <div class="flex flex-row items-center space-x-1 mt-4">
                <x-primary-button class="mr-2" id="verify-btn">
                    {{ __('Verify') }}
                </x-primary-button>
                @if (session('verify_status') === 'verify-successful')
                    <p class="text-sm text-green-600 dark:text-green-400">
                        {{ __('Document Verification was successful!') }}
                    </p>
                    <img src="{{ asset('images/icons/success-icon.png') }}" class="w-3 h-3 -mt-[1px]" />
                @endif
                @if (session('verify_status') === 'verify-failed')
                    <p class="text-sm text-red-600 dark:text-red-400">
                        {{ __('Document Verification failed!') }}
                    </p>
                    <img src="{{ asset('images/icons/error-icon.png') }}" class="w-3 h-3 -mt-[1px]" />
                @endif
            </div>
        @endif
    </div>
</form>

<div id="clones" class="hidden">
    <!-- File -->
    <div id="file-input-clone" class="mt-4 hidden">
        <x-input-label class="m-0 mr-2 p-0" for="file-input" :value="__('File') . ' (maximum size of 3MB)'" />
        <x-input-file id="file-input" type="file" name="file" class="form-control block m-0 p-0 w-[90%] bg-white file-input" accept=".txt,.pdf,.csv,.xlx,.xls,.xlsx,.doc,.docx,.html,.css,.js,.jpg,.jpeg,.png,.gif,.mp4,.avi,.3gp,.webm,.wav,.ogg,.mp3" required autofocus />
        <x-input-error :messages="$errors->get('file')" class="mt-2 file-error" />
    </div>

    <!-- Link -->
    <div id="link-input-clone" class="mt-4 hidden">
        <x-input-label class="m-0 mr-2 p-0" for="link-input" :value="__('Link') . ' (maximum download size of 3MB)'" />
        <x-text-input id="link-input" type="text" name="link" class="form-control block m-0 p-0 py-1 px-2 w-[90%] bg-white" required />
        <x-input-error :messages="$errors->get('link')" class="mt-2" />
    </div>
    
    <!-- Error -->
    <ul class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2 error-ul">
        <li></li>
    </ul>
</div>

