<div class="w-[90%] border-b border-gray-300">
    <p>Signing History</p>
</div>
<div class="relative scroll-container w-[90%] overflow-auto">
    <div class="max-w-[400px] grid gap-x-0 gap-y-0 items-center grid-cols-[repeat(6,min-content)] text-sm">
        <div class="inline-grid col-span-1 border-l border-r border-b border-solid border-gray-300 bg-gray-50 font-bold">
            <p class="p-2 whitespace-nowrap">S/N</p>
        </div>
        <div class="inline-grid col-span-1 border-r border-b border-solid border-gray-300 bg-gray-50 font-bold" >
            <p class="p-2 whitespace-nowrap">File Name</p>
        </div>
        <div class="inline-grid col-span-1 border-r border-b border-solid border-gray-300 bg-gray-50 font-bold" >
            <p class="p-2 whitespace-nowrap">Size</p>
        </div>
        <div class="inline-grid col-span-1 border-r border-b border-solid border-gray-300 bg-gray-50 font-bold" >
            <p class="p-2 whitespace-nowrap">Date Signed</p>
        </div>
        <div class="inline-grid col-span-1 border-r border-b border-solid border-gray-300 bg-gray-50 font-bold" >
            <p class="p-2 whitespace-nowrap">URL</p>
        </div>
        <div class="inline-grid col-span-1 border-r border-b border-solid border-gray-300 bg-gray-50 font-bold" >
            <p class="p-2 whitespace-nowrap">Path</p>
        </div>
        @foreach ($files as $file)
            <div class="inline-grid col-span-1 border-l border-r border-b border-solid border-gray-300 bg-gray-50">
                <p class="p-2 whitespace-nowrap">{{ ++$count }}</p>
            </div>
            <div class="inline-grid col-span-1 border-r border-b border-solid border-gray-300 bg-gray-50" >
                <p class="p-2 whitespace-nowrap">{{ $file->name }}</p>
            </div>
            <div class="inline-grid col-span-1 border-r border-b border-solid border-gray-300 bg-gray-50" >
                <p class="p-2 whitespace-nowrap">{{ $file->size }}B</p>
            </div>
            <div class="inline-grid col-span-1 border-r border-b border-solid border-gray-300 bg-gray-50" >
                <p class="p-2 whitespace-nowrap">{{ $file->created_at }}</p>
            </div>
            <div class="inline-grid col-span-1 border-r border-b border-solid border-gray-300 bg-gray-50" >
                <p class="p-2 whitespace-nowrap">@if($file->is_url) Yes @else No @endif</p>
            </div>
            <div class="inline-grid col-span-1 border-r border-b border-solid border-gray-300 bg-gray-50" >
                <p class="p-2 whitespace-nowrap">{{ $file->path }}</p>
            </div>
        @endforeach
    </div>
</div>