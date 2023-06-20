<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'equipo_id',
    ];

    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }

    public function plazas ()
    {
        return $this->hasMany(Plaza::class);
    }

    public function ofertasFormales ()
    {
        return $this->hasMany(OfertaFormal::class);
    }
}
