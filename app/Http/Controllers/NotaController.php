<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use App\Models\Estudiante;
use App\Models\Materia;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    public function index()
    {
        $notas = Nota::with(['estudiante', 'materia'])->get();
        return view('notas.index', compact('notas'));
    }

    public function create()
    {
        $estudiantes = Estudiante::all();
        $materias = Materia::all();
        return view('notas.create', compact('estudiantes', 'materias'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'estudiante_id' => 'required|exists:estudiantes,id',
            'materia_id' => 'required|exists:materias,id',
            'calificacion' => 'required|integer|min:0|max:10'
        ]);

        Nota::create([
            'estudiante_id' => $request->estudiante_id,
            'materia_id' => $request->materia_id,
            'nota' => $request->calificacion,
        ]);

        return redirect()->route('notas.index')->with('success', 'Nota creada con éxito.');
    }


    public function edit(Nota $nota)
    {
        $estudiantes = Estudiante::all();
        $materias = Materia::all();
        return view('notas.edit', compact('nota', 'estudiantes', 'materias'));
    }

    public function update(Request $request, Nota $nota)
    {
        $request->validate([
            'estudiante_id' => 'required|exists:estudiantes,id',
            'materia_id' => 'required|exists:materias,id',
            'calificacion' => 'required|numeric|between:0,10'
        ]);

        $nota->update([
            'estudiante_id' => $request->estudiante_id,
            'materia_id' => $request->materia_id,
            'nota' => $request->calificacion,
        ]);

        return redirect()->route('notas.index')->with('success', 'Nota actualizada con éxito.');
    }

    public function destroy(Nota $nota)
    {
        $nota->delete();
        return redirect()->route('notas.index')->with('success', 'Nota eliminada con éxito.');
    }
}

