<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'profesor_id',
        'seccion_id',
    ];

    public function profesor()
    {
        return $this->belongsTo(Maestro::class);
    }

    public function seccion()
    {
        return $this->belongsTo(Secciones::class);
    }

    public function alumnos()
    {
        return $this->belongsToMany(Alumno::class, 'detalle_carreras', 'materia_id', 'alumno_id')->withPivot('periodo');
    }
}
