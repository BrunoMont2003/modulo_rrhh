<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Models\Curriculum;
use Illuminate\Http\Request;

class CandidatoController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        $candidatos = Candidato::paginate(10);

        foreach ($candidatos as $candidato) {
            $candidato->curriculum = $candidato->curriculum->enlace;
        }
        return view(
            'candidatos.index',
            [
                'title' => 'Candidatos',
                'data' => $candidatos,
                'headers' => ['nombre', 'dni', 'telefono', 'email', 'cv'],
                'columns' => ['nombre', 'dni', 'telefono', 'email', 'curriculum'],
                'columns_links' => ['curriculum' => 'Ir']
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('candidatos.create', ['title' => 'Nuevo candidato']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $candidato = new Candidato();
        $candidato->nombre = $request->nombre;
        $candidato->dni = $request->dni;
        $candidato->telefono = $request->telefono;
        $candidato->email = $request->email;
        $candidato->fecha_nacimiento = $request->fecha_nacimiento;
        $candidato->direccion = $request->direccion;
        $candidato->save();

        $curriculum = new Curriculum();
        $curriculum->candidato_id = $candidato->id;
        $curriculum->titulo = "Curriculum de " . $candidato->nombre;
        $curriculum->enlace = $request->curriculum_enlace;

        $curriculum->save();


        return redirect()->route('candidatos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Candidato $candidato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Candidato $candidato)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Candidato $candidato)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidato $candidato)
    {
        //
    }
}
