<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Curso;

class EstudianteController extends Controller
{
    public function index()
    {
        $estudiantes = Estudiante::all();
        //$estudiantes = Estudiante::paginate(10);
        return view('estudiantes.index', compact('estudiantes'));
    }

    public function create()
    {
        $cursos = Curso::all();
        return view('estudiantes.create', compact('cursos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'email' => 'required|email|unique:estudiantes',
            'cursos' => 'nullable|array',
            'cursos.*' => 'exists:cursos,id',
        ]);

        $estudiante = Estudiante::create($request->only(['nombre', 'apellido', 'fecha_nacimiento', 'email']));
        $estudiante->cursos()->sync($request->cursos); // Asignar cursos al estudiante

        return redirect()->route('estudiantes.index')
                         ->with('success', 'Estudiante creado exitosamente.');
    }

    public function show(Estudiante $estudiante)
    {
        $estudiante->load('cursos');
        return view('estudiantes.show', compact('estudiante'));
    }

    public function edit(Estudiante $estudiante)
    {
        $cursos = Curso::all();
        return view('estudiantes.edit', compact('estudiante', 'cursos'));
    }


    public function update(Request $request, Estudiante $estudiante)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'email' => 'required|email|unique:estudiantes,email,' . $estudiante->id,
            'cursos' => 'nullable|array',
            'cursos.*' => 'exists:cursos,id',
        ]);

        $estudiante->update($request->only(['nombre', 'apellido', 'fecha_nacimiento', 'email']));
        $estudiante->cursos()->sync($request->cursos); // Sincronizar los cursos del estudiante

        return redirect()->route('estudiantes.index')
                         ->with('success', 'Estudiante actualizado exitosamente.');
    }   

    public function destroy(Estudiante $estudiante)
    {
        $estudiante->delete();

        return redirect()->route('estudiantes.index')
                        ->with('success', 'Estudiante eliminado exitosamente.');
    }
}
