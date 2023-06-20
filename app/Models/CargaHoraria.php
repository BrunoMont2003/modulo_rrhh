<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CargaHoraria extends Model
{
    use HasFactory;

    protected $fillable = [
        'descripcion',
        'horas_semana',
        'horas_mensuales',
    ];

    public function horarios()
    {
        return $this->hasMany(Horario::class);
    }
}
