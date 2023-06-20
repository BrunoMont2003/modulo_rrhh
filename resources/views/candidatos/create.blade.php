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
                    <form method="POST" action="{{ route('candidatos.store') }}" class="grid md:grid-cols-2 gap-5">
                        @csrf

                        <div>
                            <x-input-label for="nombre" :value="__('Nombre')" />
                            <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre"
                                :value="old('nombre')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email')" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>


                        <div>
                            <x-input-label for="dni" :value="__('DNI')" />
                            <x-text-input id="dni" class="block mt-1 w-full" type="text" name="dni"
                                :value="old('dni')" required autofocus autocomplete="off" />
                            <x-input-error :messages="$errors->get('dni')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="fecha_nacimiento" :value="__('Fecha de Nacimiento')" />
                            <x-text-input id="fecha_nacimiento" class="block mt-1 w-full" type="date"
                                name="fecha_nacimiento" :value="old('fecha_nacimiento')" required />
                            <x-input-error :messages="$errors->get('fecha_nacimiento')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="genero" :value="__('Género')" />
                            <x-select-input id="genero" class="block mt-1 w-full" name="genero" :value="old('genero')"
                                required>
                                <option value="">Seleccione una opción</option>
                                <option value="masculino">Masculino</option>
                                <option value="femenino">Femenino</option>
                            </x-select-input>
                            <x-input-error :messages="$errors->get('genero')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="direccion" :value="__('Dirección')" />
                            <x-text-input id="direccion" class="block mt-1 w-full" type="text" name="direccion"
                                :value="old('direccion')" required />
                            <x-input-error :messages="$errors->get('direccion')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="telefono" :value="__('Teléfono')" />
                            <x-text-input id="telefono" class="block mt-1 w-full" type="text" name="telefono"
                                :value="old('telefono')" required />
                            <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="curriculum_enlace" :value="__('Enlace De Currículum')" />
                            <x-text-input id="curriculum_enlace" class="block mt-1 w-full" type="text"
                                name="curriculum_enlace" :value="old('curriculum_enlace')" required />
                            <x-input-error :messages="$errors->get('curriculum_enlace')" class="mt-2" />
                        </div>


                        <div class="col-span-full">
                            <x-primary-button class="">
                                {{ __('GUARDAR') }}
                            </x-primary-button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
