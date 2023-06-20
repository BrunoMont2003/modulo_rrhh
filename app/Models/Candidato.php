<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'dni',
        'fecha_nacimiento',
        'genero',
        'direccion',
        'telefono',
        'email',
    ];

    public function antecendentes()
    {
        return $this->hasMany(Antecedente::class);
    }

    public function curriculum()
    {
        return $this->hasOne(Curriculum::class);
    }

    public function candidato_plazas()
    {
        return $this->hasMany(CandidatoPlaza::class);
    }
}
