<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Materia;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::all();
        return view('cursos.index', compact('cursos'));
    }

    public function create()
    {
        $materias = Materia::all();
        return view('cursos.create', compact('materias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:255',
            'materias' => 'nullable|array',
            'materias.*' => 'exists:materias,id',
        ]);

        $curso = Curso::create($request->only(['nombre', 'descripcion']));
        $curso->materias()->sync($request->materias);

        return redirect()->route('cursos.index')->with('success', 'Curso creado con éxito.');
    }

    public function edit(Curso $curso)
    {
        $materias = Materia::all();
        return view('cursos.edit', compact('curso', 'materias'));
    }

    public function update(Request $request, Curso $curso)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:255',
            'materias' => 'nullable|array',
            'materias.*' => 'exists:materias,id',
        ]);

        $curso->update($request->only(['nombre', 'descripcion']));
        $curso->materias()->sync($request->materias); // Sincronizar las materias del curso

        return redirect()->route('cursos.index')->with('success', 'Curso actualizado con éxito.');
    }

    public function destroy(Curso $curso)
    {
        $curso->delete();

        return redirect()->route('cursos.index')->with('success', 'Curso eliminado con éxito.');
    }
}

