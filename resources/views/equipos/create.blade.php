<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ __('Registrar equipo') }}
        </h2>
    </x-slot>

    <div class="p-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 shadow-sm overflow-hidden sm:rounded-lg w-full">
                <div class="p-6 text-gray-900 dark:text-white flex flex-col gap-2 ">
                    <x-equipos.form
                    ></x-equipos.form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
