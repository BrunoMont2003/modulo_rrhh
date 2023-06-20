<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nomina extends Model
{
    use HasFactory;

    protected $fillable = [
        'colaborador_id',
        'fecha_inicio',
        'fecha_fin',
        'total_bruto',
        'total_neto',
        'estado_pago',
    ];

    public function colaborador()
    {
        return $this->belongsTo(Colaborador::class);
    }

    public function detalles()
    {
        return $this->hasMany(DetalleNomina::class);
    }
}
