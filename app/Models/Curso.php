<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    public function estudiantes()
    {
        return $this->belongsToMany(Estudiante::class, 'estudiante_curso');
    }

    public function materias()
    {
        return $this->belongsToMany(Materia::class, 'curso_materia');
    }
}
