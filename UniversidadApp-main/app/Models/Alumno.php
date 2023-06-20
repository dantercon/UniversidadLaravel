<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $fillable = [
        'cedula',
        'nombre',
        'apellido',
        'telefono',
        'email',
        'direccion',
        'user_id',
        'seccion_id',
        'record_academico_id',
        'carrera_id',
    ];

    public function carrera()
    {
        return $this->belongsTo(Carreras::class);
    }

    public function materias()
    {
        return $this->belongsToMany(Materia::class, 'detalle_carreras', 'alumno_id', 'materia_id')->withPivot('periodo');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

        public function sedes()
    {
        return $this->belongsTo('App\Models\Sedes');
    }
    
}
