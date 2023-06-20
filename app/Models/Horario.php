<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    protected $fillable = [
        'colaborador_id',
        'carga_horaria_id',
        'dia_semana',
        'hora_inicio',
        'hora_fin',
        'asignatura_id',
    ];

    public function colaborador()
    {
        return $this->belongsTo(Colaborador::class);
    }

    public function carga_horaria()
    {
        return $this->belongsTo(CargaHoraria::class);
    }

    public function asignatura()
    {
        return $this->belongsTo(Asignatura::class);
    }
}