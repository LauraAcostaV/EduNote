@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Agregar Curso</h1>
        <form action="{{ route('cursos.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <input type="text" name="descripcion" class="form-control">
            </div>
            <div class="form-group">
                <label for="materias">Materias:</label>
                <select name="materias[]" id="materias" class="form-control" multiple>
                    @foreach ($materias as $materia)
                        <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Guardar</button>
        </form>
    </div>
@endsection

