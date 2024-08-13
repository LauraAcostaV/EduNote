@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Estudiante</h1>
        <form action="{{ route('estudiantes.update', $estudiante->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" class="form-control" value="{{ $estudiante->nombre }}" required>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" name="apellido" class="form-control" value="{{ $estudiante->apellido }}" required>
            </div>
            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                <input type="date" name="fecha_nacimiento" class="form-control" value="{{ $estudiante->fecha_nacimiento }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" value="{{ $estudiante->email }}" required>
            </div>
            <div class="form-group">
                <label for="cursos">Cursos:</label>
                <select name="cursos[]" id="cursos" class="form-control" multiple>
                    @foreach ($cursos as $curso)
                        <option value="{{ $curso->id }}" 
                            {{ $estudiante->cursos->contains($curso->id) ? 'selected' : '' }}>
                            {{ $curso->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Actualizar</button>
        </form>
    </div>
@endsection

