<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfertaFormal extends Model
{
    use HasFactory;

    protected $fillable = [
        'puesto_id',
        'fecha_inicio',
        'fecha_fin',
        'descripcion',
        'salario',
        'beneficios',
    ];

    protected $casts = [
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date',
    ];

    public function puesto()
    {
        return $this->belongsTo(Puesto::class);
    }
}
