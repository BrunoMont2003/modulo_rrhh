<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleNomina extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomina_id',
    ];

    protected $table = 'detalle_nominas';
    public function nomina()
    {
        return $this->belongsTo(Nomina::class);
    }

    public function sueldo()
    {
        return $this->hasOne(Sueldo::class);
    }

    public function descuento()
    {
        return $this->hasOne(Descuento::class);
    }

    public function prestacion ()
    {
        return $this->hasOne(Prestacion::class);
    }
}
