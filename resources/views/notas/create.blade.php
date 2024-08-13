@extends('layouts.app')

@section('title', 'Crear Nota')

@section('content')
    <h2>Crear Nota</h2>
    <form action="{{ route('notas.store') }}" method="POST">
        @csrf
        <label for="estudiante_id">Estudiante:</label>
        <select name="estudiante_id" id="estudiante_id">
            @foreach ($estudiantes as $estudiante)
                <option value="{{ $estudiante->id }}">{{ $estudiante->nombre }}</option>
            @endforeach
        </select>

        <label for="materia_id">Materia:</label>
        <select name="materia_id" id="materia_id">
            @foreach ($materias as $materia)
                <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
            @endforeach
        </select>

        <label for="calificacion">Calificación:</label>
        <input type="number" name="calificacion" id="calificacion" step="0.01" required>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection
