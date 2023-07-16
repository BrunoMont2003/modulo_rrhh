<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postulacion extends Model
{
    use HasFactory;

    protected $table = 'postulaciones';

    protected $fillable = [
        'postulante_id',
        'plaza_id',
        'estado',
        'fecha_postulacion',
    ];

    protected $casts = [
        'estado' => 'string',
    ];

    public function postulante()
    {
        return $this->belongsTo(Postulante::class, 'postulante_id');
    }

    public function plaza()
    {
        return $this->belongsTo(Plaza::class, 'plaza_id');
    }
}
