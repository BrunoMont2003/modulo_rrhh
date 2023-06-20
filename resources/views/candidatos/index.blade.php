<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($title) }}
        </h2>
    </x-slot>

    <div class="p-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm overflow-hidden sm:rounded-lg w-full">
                <div class="p-6 text-gray-900 flex flex-col gap-2 ">
                    <div class="flex w-full justify-end py-5 items-center">
                        <a class="px-4 py-2 text-white bg-indigo-600 rounded-md"
                            href="{{ route('candidatos.create') }}">Agregar</a>
                    </div>
                    <x-table :columns="$columns" :data="$data" :headers="$headers" :columns_links="$columns_links" />
                </div>
            </div>
            {{ $data->links() }}
        </div>
    </div>
</x-app-layout>
