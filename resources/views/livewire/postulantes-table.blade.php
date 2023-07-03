<div class="flex flex-col gap-5 w-full">
    <div class="flex w-full py-4  dark:border-gray-700 border-b border-gray-200 ">
        @livewire('common.search-box', ['placeholder' => 'Ingrese nombre del postulante'])
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nombre
                        @livewire('common.sort-button', ['field' => 'nombre'])
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            DNI
                            @livewire('common.sort-button', ['field' => 'dni'])

                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Email
                            @livewire('common.sort-button', ['field' => 'email'])

                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Telefono
                            @livewire('common.sort-button', ['field' => 'telefono'])

                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            CV
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($postulantes as $postulante)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $postulante->nombre }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $postulante->dni }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $postulante->email }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $postulante->telefono }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ $postulante->curriculum_url }}" target="_blank" class="font-medium">
                                @livewire('icons.cv', [], key($postulante->id))
                            </a>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('postulantes.edit', $postulante->id) }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <div
            class="pagination-links px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            {{ $postulantes->links() }}
        </div>
        <div wire:loading.flex
            class="absolute top-0 left-0 flex items-center justify-center w-full h-full dark:bg-gray-700 bg-gray-300 opacity-75 z-20">
            <x-spinner></x-spinner>
        </div>
    </div>

</div>
