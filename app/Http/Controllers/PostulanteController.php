<?php

namespace App\Http\Controllers;

use App\Models\Postulante;
use Illuminate\Http\Request;

class PostulanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        return view('postulantes.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('postulantes.create', ['title' => 'Nuevo postulante']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $postulante = new Postulante();
        $postulante->nombre = $request->nombre;
        $postulante->dni = $request->dni;
        $postulante->telefono = $request->telefono;
        $postulante->email = $request->email;
        $postulante->fecha_nacimiento = $request->fecha_nacimiento;
        $postulante->direccion = $request->direccion;
        $postulante->save();


        return redirect()->route('postulantes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Postulante $postulante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Postulante $postulante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Postulante $postulante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Postulante $postulante)
    {
        //
    }
}
