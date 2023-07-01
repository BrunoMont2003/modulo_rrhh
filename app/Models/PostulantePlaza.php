<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostulantePlaza extends Model
{
    use HasFactory;

    protected $primaryKey = ['postulante_id', 'plaza_id'];
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'postulante_id',
        'plaza_id',
        'estado',
        'fecha_postulacion',
    ];

    protected $casts = [
        'estado' => 'string',
        'fecha_postulacion' => 'date',
    ];

    public function postulante()
    {
        return $this->belongsTo(postulante::class, 'postulante_id');
    }

    public function plaza()
    {
        return $this->belongsTo(Plaza::class, 'plaza_id');
    }
}
