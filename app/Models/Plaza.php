<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plaza extends Model
{
    use HasFactory;

    protected $fillable = [
        'puesto_id',
        'fecha_inicio',
        'fecha_fin',
        'descripcion',
    ];

    public function puesto()
    {
        return $this->belongsTo(Puesto::class, 'puesto_id');
    }

    public function candidatosPlaza()
    {
        return $this->hasMany(CandidatoPlaza::class, 'plaza_id');
    }
}
