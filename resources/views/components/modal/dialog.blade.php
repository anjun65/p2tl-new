@props(['id' => null, 'maxWidth' => null])

<x-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }} overflow-auto>
    
    <div class="px-6 py-3 text-lg">
        {{ $title }}
    </div>

    <div class="px-6" style="max-height: calc(100vh - 200px);overflow-y: auto;">
        <div class="mt-4">
            {{ $content }}
        </div>
    </div>

    <div class="px-6 py-4 bg-gray-100 text-right">
        {{ $footer }}
    </div>
</x-modal>
