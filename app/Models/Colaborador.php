<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colaborador extends Model
{
    use HasFactory;

    protected $fillable = [
        'puesto_id',
        'contrato_id',
        'nombre',
        'dni',
        'fecha_nacimiento',
        'genero',
        'direccion',
        'telefono',
        'email',
        'esDocente',
    ];
    protected $table = 'colaboradores';

    protected $casts = [
        'fecha_nacimiento' => 'date',
        'esDocente' => 'boolean',
    ];

    public function puesto()
    {
        return $this->belongsTo(Puesto::class, 'puesto_id');
    }

    public function contrato()
    {
        return $this->belongsTo(Contrato::class, 'contrato_id');
    }

    public function nominas()
    {
        return $this->hasMany(Nomina::class, 'colaborador_id');
    }

    public function horarios()
    {
        return $this->hasMany(Horario::class, 'colaborador_id');
    }
}
