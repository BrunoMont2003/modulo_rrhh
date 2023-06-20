<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidatoPlaza extends Model
{
    use HasFactory;

    protected $primaryKey = ['candidato_id', 'plaza_id'];
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'candidato_id',
        'plaza_id',
        'estado',
        'fecha_postulacion',
    ];

    protected $casts = [
        'estado' => 'string',
        'fecha_postulacion' => 'date',
    ];

    public function candidato()
    {
        return $this->belongsTo(Candidato::class, 'candidato_id');
    }

    public function plaza()
    {
        return $this->belongsTo(Plaza::class, 'plaza_id');
    }
}
