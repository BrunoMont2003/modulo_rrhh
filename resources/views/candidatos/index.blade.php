<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($title) }}
        </h2>
    </x-slot>

    <div class="p-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm overflow-hidden sm:rounded-lg w-full">
                <div class="p-6 text-gray-900">
                    <x-table :columns="$columns" :data="$data" :headers="$headers" :columns_links="$columns_links" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
