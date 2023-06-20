<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antecedente extends Model
{
    use HasFactory;

    protected $fillable = [
        'candidato_id',
        'tipo',
        'descripcion',
        'fecha',
    ];

    public function candidato()
    {
        return $this->belongsTo(Candidato::class);
    }
}
