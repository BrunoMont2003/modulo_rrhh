<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Postulante extends Model
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
        'curriculum_url',
    ];


    public function postulaciones(): HasMany
    {
        return $this->hasMany(Postulacion::class, 'postulante_id');
    }
}
