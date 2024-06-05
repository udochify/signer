<div class="relative flex flex-col items-center w-full h-fit bg-[#E5EBF1] rounded-lg pl-6 pr-4 sm:pl-14 py-6">
    <form class="w-full" method="POST" action="{{ route('files.sign') }}" enctype="multipart/form-data">
        @csrf

        <div>
            <x-input-label class="m-0 mr-2 p-0" :value="__('Type of Resource')" />
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
        </div>

        <!-- Container -->
        <div id="form-container" class="mt-4">
            <x-input-label class="m-0 mr-2 p-0" for="file" :value="__('File')" />
            <x-input-file id="file" type="file" name="file" class="form-control block m-0 p-0 w-[90%] bg-white" accept=".txt,.pdf,.csv,.xlx,.xls,.xlsx,.doc,.docx,.html,.css,.js,.jpg,.jpeg,.png,.gif,.mp4,.avi,.3gp,.webm,.wav,.ogg,.mp3" required autofocus />
            <x-input-error :messages="$errors->get('file')" class="mt-2" />
        </div>

        <div class="flex flex-row items-center mt-2">
            <x-input-label for="key" :value="__('Private Key')" class="w-fit" />
            <x-text-input id="key" type="password" name="key" class="form-control block h-4 m-0 ml-2 p-0 px-1 w-[68%]" required />
        </div>
        <x-input-error :messages="$errors->get('key')" class="mt-2" />
        <div class="flex flex-row items-center mt-4 space-x-3">
            <x-primary-button>
                {{ __('Sign') }}
            </x-primary-button>
            @if (session('signing_status') === 'signing-successful')
                <p class="text-sm text-green-600 dark:text-green-400">
                    {{ __('Document Signed successfully!') }}
                </p>
            @endif
        </div>

    </form>
    
    <!-- File -->
    <div id="file-form" class="mt-4 hidden">
        <x-input-label class="m-0 mr-2 p-0" for="file" :value="__('File')" />
        <x-input-file id="file" type="file" name="file" class="form-control block m-0 p-0 w-[90%] bg-white" accept=".txt,.pdf,.csv,.xlx,.xls,.xlsx,.doc,.docx,.html,.css,.js,.jpg,.jpeg,.png,.gif,.mp4,.avi,.3gp,.webm,.wav,.ogg,.mp3" required autofocus />
        <x-input-error :messages="$errors->get('file')" class="mt-2" />
    </div>

    <!-- Link -->
    <div id="link-form" class="mt-4 hidden">
        <x-input-label class="m-0 mr-2 p-0" for="link" :value="__('Link')" />
        <x-text-input id="link" type="text" name="link" class="form-control block m-0 p-0 py-1 px-2 w-[90%] bg-white" required />
        <x-input-error :messages="$errors->get('link')" class="mt-2" />
    </div>
    <div class="relative w-full h-fit mt-4">
        @include('pages.partials.history')
    </div>
</div>