<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    use HasFactory;

    protected $fillable = [
        'candidato_id',
        'titulo',
        'enlace',
        'fecha_creacion',
    ];

    public function candidato()
    {
        return $this->belongsTo(Candidato::class);
    }
}
