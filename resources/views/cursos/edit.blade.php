@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Curso</h1>
        <form action="{{ route('cursos.update', $curso->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" class="form-control" value="{{ $curso->nombre }}" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <input type="text" name="descripcion" class="form-control" value="{{ $curso->descripcion }}">
            </div>
            <div class="form-group">
                <label for="materias">Materias:</label>
                <select name="materias[]" id="materias" class="form-control" multiple>
                    @foreach ($materias as $materia)
                        <option value="{{ $materia->id }}" 
                            {{ $curso->materias->contains($materia->id) ? 'selected' : '' }}>
                            {{ $materia->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Actualizar</button>
        </form>
    </div>
@endsection

