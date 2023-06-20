<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'detalle_nomina_id',
        'concepto',
        'monto',
        'tipo_prestacion',
        'fecha_aplicacion',
    ];

    protected $table = 'prestaciones';

    public function detalleNomina()
    {
        return $this->belongsTo(DetalleNomina::class);
    }
}
