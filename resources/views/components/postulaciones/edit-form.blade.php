@props(['postulacion' => null, 'postulantes' => [], 'plazas' => []])

@php
    use Carbon\Carbon;
    $postulante = $postulacion ? $postulacion->postulante : null;
    $generos = [
        (object) [
            'value' => 'masculino',
            'label' => 'Masculino',
        ],
        (object) [
            'value' => 'femenino',
            'label' => 'Femenino',
        ],
    ];
    $postulantes_options = [];
    foreach ($postulantes as $p) {
        $postulantes_options[] = (object) [
            'value' => $p->id,
            'label' => $p->nombre . ' - ' . $p->dni,
        ];
    }
    $plazas_options = [];
    foreach ($plazas as $p) {
        $plazas_options[] = (object) [
            'value' => $p->id,
            'label' => $p->puesto->nombre,
        ];
    }
@endphp

@if (count($plazas) == 0)
    <div class="col-span-full">
        <div>
            No hay plazas disponibles
        </div>
    </div>
@else
    <form method="POST" action="{{ route('postulaciones.update', [
        'postulacion' => $postulacion,
    ]) }}"
        class="grid md:grid-cols-2 gap-5">
        @method('PUT')
        @csrf

        <h2 class="col-span-full bold dark:text-white">Seleccionar un postulante</h2>
        <x-input-group label="Postulante" :options="$postulantes_options" name="postulante_id" type="select" class="col-span-full"
            :value="$postulante ? $postulante->id : ''">

            >
        </x-input-group>
        <h2 class="col-span-full bold dark:text-white">
            {{ __('Datos de la postulación') }}
        </h2>
        <x-input-group label="Plaza" required :options="$plazas_options" name="plaza_id" type="select" :value="$postulacion ? $postulacion->plaza_id : ''">
            >
        </x-input-group>

        <x-input-group label="Fecha de Postulación" name="fecha_postulacion" type="date" required :value="$postulacion ? $postulacion->fecha_postulacion : ''">
            >
        </x-input-group>
        <div class="col-span-2">
            <x-primary-button type="submit" class="bg-green-500 hover:bg-green-700">
                {{ __('Guardar') }}
            </x-primary-button>
        </div>


    </form>
@endif
