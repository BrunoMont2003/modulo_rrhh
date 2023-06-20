<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Descuento extends Model
{
    use HasFactory;

    protected $fillable = [
        'detalle_nomina_id',
        'concepto',
        'monto',
        'tipo',
    ];

    public function detalleNomina()
    {
        return $this->belongsTo(DetalleNomina::class);
    }
}
