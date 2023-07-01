<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Empleado extends Model
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
    protected $table = 'empleados';

    protected $casts = [
        'fecha_nacimiento' => 'date',
        'esDocente' => 'boolean',
    ];

    public function puesto(): BelongsTo
    {
        return $this->belongsTo(Puesto::class, 'puesto_id');
    }

    public function contratos(): HasMany
    {
        return $this->hasMany(Contrato::class, 'empleado_id');
    }

    public function nominas(): HasMany
    {
        return $this->hasMany(Nomina::class, 'empleado_id');
    }

    public function horarios() : HasMany
    {
        return $this->hasMany(Horario::class, 'empleado_id');
    }
}
