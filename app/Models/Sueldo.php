<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sueldo extends Model
{
    use HasFactory;

    protected $fillable = [
        'detalle_nomina_id',
        'monto',
    ];

    public function detalleNomina()
    {
        return $this->belongsTo(DetalleNomina::class);
    }
}
