<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'fecha_nacimiento',
        'email',
    ];

    public function cursos()
    {
        return $this->belongsToMany(Curso::class, 'estudiante_curso');
    }

    public function notas()
    {
        return $this->hasMany(Nota::class);
    }
}
