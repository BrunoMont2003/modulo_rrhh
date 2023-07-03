<form method="POST" action="{{ route('postulantes.store') }}" class="grid md:grid-cols-2 gap-5">
    @csrf

    <x-input-group label="Nombre" name="nombre" type="text" required placeholder="Ingrese nombre del postulante" />

    <x-input-group label="Email" name="email" type="email" required placeholder="Ingrese email del postulante" />

    <x-input-group label="DNI" name="dni" type="text" required placeholder="Ingrese DNI del postulante" />

    <x-input-group label="Fecha de Nacimiento" name="fecha_nacimiento" type="date" required />

    <x-input-group label="Género" name="genero" type="select" required :options="['masculino', 'femenino']" />

    <x-input-group label="Dirección" name="direccion" type="text" required
        placeholder="Ingrese dirección del postulante" />

    <x-input-group label="Teléfono" name="telefono" type="text" required
        placeholder="Ingrese teléfono del postulante" />

    <x-input-group label="Enlace de Currículum" name="curriculum_url" type="text" required
        placeholder="Ingrese enlace de currículum del postulante" />


    <div class="col-span-2">
        <x-primary-button type="submit" class="bg-green-500 hover:bg-green-700">
            {{ __('Guardar') }}
        </x-primary-button>
    </div>


</form>
