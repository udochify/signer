<div class="w-[90%] border-b border-gray-300">
    <p>Signature Information</p>
</div>
<div class="relative scroll-container w-[90%] overflow-auto">
    <div class="max-w-[400px] flex flex-row items-start space-x-5">
        <div class="relative flex flex-col space-y-2 w-32 h-40 border-8 border-gray-600 border-solid p-2">
            <div class="flex flex-row space-x-2">
                <div class="w-12 h-14 bg-gray-600"></div>
                <div class="flex flex-col space-y-2">
                    <div class="w-10 h-3 bg-gray-600"></div>
                    <div class="w-10 h-3 bg-gray-600"></div>
                    <div class="w-10 h-3 bg-gray-600"></div>
                </div>
            </div>
            <div class="w-24 h-3 bg-gray-600"></div>
            <div class="w-24 h-3 bg-gray-600"></div>
            <div class="w-24 h-3 bg-gray-600"></div>
            <div class="w-24 h-3 bg-gray-600"></div>
        </div>
        <div class="flex flex-col items-start space-y-4 text-sm">
            <div class="flex flex-col items-start space-y-2">
                <div class="border-b border-gray-300 border-solid font-bold w-96">
                    <p>File Information</p>
                </div>
                <div class="flex flex-row space-x-2">
                    <div>
                        <p>Name:</p>
                    </div>
                    <div>
                        <p class="whitespace-nowrap">{{ $file->name ?? "" }}</p>
                    </div>
                </div>
                <div class="flex flex-row space-x-2">
                    <div>
                        <p>Date Signed:</p>
                    </div>
                    <div>
                        <p class="whitespace-nowrap">{{ $file->created_at ?? "" }}</p>
                    </div>
                </div>
                <div class="flex flex-row space-x-2">
                    <div>
                        <p>Url:</p>
                    </div>
                    <div>
                        <p class="whitespace-nowrap">{{ $file->path ?? "" }}</p>
                    </div>
                </div>
                <div class="flex flex-row space-x-2">
                    <div>
                        <p>Size:</p>
                    </div>
                    <div>
                        <p class="whitespace-nowrap">{{ $file->size ?? "" }}</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-col items-start space-y-2">
                <div class="border-b border-gray-300 border-solid font-bold w-96">
                    <p>Signer Information</p>
                </div>
                <div class="flex flex-row space-x-2">
                    <div>
                        <p>Name:</p>
                    </div>
                    <div>
                        @if($file->privacy_name ?? false)
                        <p class="whitespace-nowrap">
                            @if(($user->surname ?? false) || ($user->firstname ?? false))
                                {{ $user->surname }}&nbsp;{{ $user->firstname }}
                            @else 
                                {{ $user->name ?? "" }}
                            @endif
                        </p>
                        @endif
                    </div>
                </div>
                <div class="flex flex-row space-x-2">
                    <div>
                        <p>Email:</p>
                    </div>
                    <div>
                        @if($file->privacy_email ?? false)
                        <p class="whitespace-nowrap">{{ $user->email ?? "" }}</p>
                        @endif
                    </div>
                </div>
                <div class="flex flex-row space-x-2">
                    <div>
                        <p>Address:</p>
                    </div>
                    <div>
                        @if($file->privacy_address ?? false)
                        <p class="whitespace-nowrap">{{ $user->address ?? "" }}</p>
                        @endif
                    </div>
                </div>
                <div class="flex flex-row space-x-2">
                    <div>
                        <p>Phone:</p>
                    </div>
                    <div>
                        @if($file->privacy_phone ?? false)
                        <p class="whitespace-nowrap">{{ $user->phone ?? "" }}</p>
                        @endif
                    </div>
                </div>
                <div class="flex flex-row space-x-2">
                    <div>
                        <p>Gender:</p>
                    </div>
                    <div>
                        @if($file->privacy_gender ?? false)
                        <p class="whitespace-nowrap">{{ $user->gender ?? "" }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

