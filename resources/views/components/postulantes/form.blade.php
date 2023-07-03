@props(['postulante' => null])

<form method="POST" action="{{ $postulante ? route('postulantes.update', $postulante) : route('postulantes.store') }}"
    class="grid md:grid-cols-2 gap-5">
    @csrf
    {{ $postulante ? method_field('PUT') : '' }}

    <x-input-group value="{{ $postulante ? $postulante->nombre : '' }}" label="Nombre" name="nombre" type="text"
        required placeholder="Ingrese nombre del postulante" />

    <x-input-group value="{{ $postulante ? $postulante->email : '' }}" label="Email" name="email" type="email"
        required placeholder="Ingrese email del postulante" />

    <x-input-group value="{{ $postulante ? $postulante->dni : '' }}" label="DNI" name="dni" type="text"
        required placeholder="Ingrese DNI del postulante" />

    <x-input-group value="{{ $postulante ? $postulante->fecha_nacimiento : '' }}" label="Fecha de Nacimiento"
        name="fecha_nacimiento" type="date" required />

    <x-input-group value="{{ $postulante ? $postulante->genero : '' }}" label="Género" name="genero" type="select"
        required :options="['masculino', 'femenino']" />

    <x-input-group value="{{ $postulante ? $postulante->direccion : '' }}" label="Dirección" name="direccion"
        type="text" required placeholder="Ingrese dirección del postulante" />

    <x-input-group value="{{ $postulante ? $postulante->telefono : '' }}" label="Teléfono" name="telefono"
        type="text" required placeholder="Ingrese teléfono del postulante" />

    <x-input-group value="{{ $postulante ? $postulante->curriculum_url : '' }}" label="Enlace de Currículum"
        name="curriculum_url" type="text" required placeholder="Ingrese enlace de currículum del postulante" />


    <div class="col-span-2">
        <x-primary-button type="submit" class="bg-green-500 hover:bg-green-700">
            {{ __('Guardar') }}
        </x-primary-button>
    </div>


</form>
