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
    public function index()
    {
        return view('postulaciones.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('postulaciones.create', ['postulantes' => Postulante::all(), 'plazas' => Plaza::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate($this->rulesWithOutPostulante());
        if ($request->input('postulante_id') == null) {
            $data_postulante = $request->validate(PostulanteController::rules(), PostulanteController::messages());
            $postulante_new = Postulante::create($data_postulante);
            $request['postulante_id'] = $postulante_new->id;
        }

        $data = $this->validate($request, $this->rules());

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
        return view('postulaciones.edit', compact('postulacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Postulacion $postulacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Postulacion $postulacion)
    {
        //
    }
}
