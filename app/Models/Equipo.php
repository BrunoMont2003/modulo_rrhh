<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    public function puestos ()
    {
        return $this->belongsToMany(Puesto::class);
    }
}
