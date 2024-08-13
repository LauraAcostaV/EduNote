@extends('layouts.app')

@section('title', 'Editar Nota')

@section('content')
    <h2>Editar Nota</h2>
    <form action="{{ route('notas.update', $nota->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="estudiante_id">Estudiante:</label>
        <select name="estudiante_id" id="estudiante_id">
            @foreach ($estudiantes as $estudiante)
                <option value="{{ $estudiante->id }}" {{ $estudiante->id == $nota->estudiante_id ? 'selected' : '' }}>
                    {{ $estudiante->nombre }}
                </option>
            @endforeach
        </select>

        <label for="materia_id">Materia:</label>
        <select name="materia_id" id="materia_id">
            @foreach ($materias as $materia)
                <option value="{{ $materia->id }}" {{ $materia->id == $nota->materia_id ? 'selected' : '' }}>
                    {{ $materia->nombre }}
                </option>
            @endforeach
        </select>

        <label for="calificacion">Calificación:</label>
        <input type="number" name="calificacion" id="calificacion" value="{{ $nota->nota }}" step="0.01" required>

        <button type="submit">Actualizar</button>
    </form>
@endsection
