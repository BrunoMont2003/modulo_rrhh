<?php

namespace App\Http\Controllers;

use App\Models\Plaza;
use App\Models\Postulacion;
use App\Models\Postulante;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class PostulacionController extends Controller
{

    use ValidatesRequests;
    protected function rulesWithOutPostulante()
    {
        return [
            'plaza_id' => 'required|exists:plazas,id',
            'fecha_postulacion' => 'required|date|after_or_equal:today'
        ];
    }

    protected function rules()
    {
        return [
            'postulante_id' => 'required|exists:postulantes,id',
            'plaza_id' => 'required|exists:plazas,id',
            'fecha_postulacion' => 'required|date|after_or_equal:today'
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index(
        Request $request
    ) {
        $mode =  $request->input('mode');
        return view('postulaciones.index', compact('mode'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // devolver solo las plazas cuya fecha de inicio ya haya pasado
        $plazas = Plaza::where('fecha_inicio', '<', date('Y-m-d'))->get();
        return view('postulaciones.create', ['postulantes' => Postulante::all(), 'plazas' => $plazas]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        date_default_timezone_set('America/Lima');
        $request->validate($this->rulesWithOutPostulante());
        // if postulante_id is set and nombre, email and dni are set, return error
        if ($request->input('postulante_id') != null && ($request->input('nombre') != null || $request->input('email') != null || $request->input('dni') != null)) {
            session()->flash('toast', [
                'message' => 'Tienes que deseleccionar el postulante para crear uno nuevo',
                'type' => 'error',
            ]);
            return redirect()->route('postulaciones.create')->withInput();
        }
        // if postulante_id is null, create a new postulante
        if ($request->input('postulante_id') == null) {
            $data_postulante = $request->validate(PostulanteController::rules(), PostulanteController::messages());
            $postulante_new = Postulante::create($data_postulante);
            $request['postulante_id'] = $postulante_new->id;
        }

        $data = $this->validate($request, $this->rules());


        // validar que no se postule a la misma plaza
        $postulaciones = Postulacion::where('postulante_id', $data['postulante_id'])->get();

        foreach ($postulaciones as $postulacion) {
            if ($postulacion->plaza_id == $data['plaza_id']) {
                session()->flash('toast', [
                    'message' => 'El postulante ya se encuentra postulado a esta plaza',
                    'type' => 'error',
                ]);
                return redirect()->route('postulaciones.create')->withInput();
            }
        }

        Postulacion::create($data);

        session()->flash('toast', [
            'message' => 'Postulación añadida correctamente',
            'type' => 'success',
        ]);

        return redirect()->route('postulaciones.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Postulacion $postulacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Postulacion $postulacion)
    {
        // devolver solo las plazas cuya fecha de inicio ya haya pasado
        $plazas = Plaza::where('fecha_inicio', '<', date('Y-m-d'))->get();
        return view(
            'postulaciones.edit',
            [
                'postulacion' => $postulacion,
                'postulantes' => Postulante::orderBy('nombre')->get(),
                'plazas' => $plazas
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Postulacion $postulacion)
    {
        date_default_timezone_set('America/Lima');
        // if postulante_id is null, create a new postulante
        $data = $this->validate($request, $this->rules());
        // validar que no se postule a la misma plaza excepto si es la misma postulacion
        $postulaciones = Postulacion::where('postulante_id', $data['postulante_id'])->get();

        foreach ($postulaciones as $p) {
            if ($p->plaza_id == $data['plaza_id'] && $p->id != $postulacion->id) {
                session()->flash('toast', [
                    'message' => 'El postulante ya se encuentra postulado a esta plaza',
                    'type' => 'error',
                ]);
                return redirect()->route('postulaciones.edit', $postulacion)->withInput();
            }
        }


        $postulacion->update($data);

        session()->flash('toast', [
            'message' => 'Postulación actualizada correctamente',
            'type' => 'success',
        ]);

        return redirect()->route('postulaciones.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Postulacion $postulacion)
    {
        $postulacion->delete();
        session()->flash('toast', [
            'message' => 'Postulación eliminada correctamente',
            'type' => 'success',
        ]);

        return redirect()->route('postulaciones.index');
    }

    public function destroyByPostulante(Postulante $postulante)
    {
        $postulaciones = Postulacion::where('postulante_id', $postulante->id)
            ->get();

        foreach ($postulaciones as $postulacion) {
            Postulacion::where('plaza_id', $postulacion->plaza_id)
                ->where('postulante_id', $postulacion->postulante_id)
                ->delete();
        }

        session()->flash('toast', [
            'message' => 'Postulaciones eliminadas correctamente',
            'type' => 'success',
        ]);

        return redirect()->route('postulaciones.index', ['mode' => 'postulante']);
    }
    public function destroyByPlaza(Plaza $plaza)
    {
        $postulaciones = Postulacion::where('plaza_id', $plaza->id)
            ->get();

        foreach ($postulaciones as $postulacion) {
            Postulacion::where('plaza_id', $postulacion->plaza_id)
                ->where('postulante_id', $postulacion->postulante_id)
                ->delete();
        }

        session()->flash('toast', [
            'message' => 'Postulaciones eliminadas correctamente',
            'type' => 'success',
        ]);

        return redirect()->route('postulaciones.index', ['mode' => 'plaza']);
    }
}
