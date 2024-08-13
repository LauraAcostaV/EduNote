@extends('layouts.app')

@section('title', 'Listado de Notas')

@section('content')
    <div class="container">
        <h2>Listado de Notas</h2>
        <a href="{{ route('notas.create') }}" class="btn btn-primary mb-3">Crear Nota</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Estudiante</th>
                    <th>Materia</th>
                    <th>Calificación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($notas as $nota)
                    <tr>
                        <td>{{ $nota->id }}</td>
                        <td>{{ $nota->estudiante->nombre }}</td>
                        <td>{{ $nota->materia->nombre }}</td>
                        <td>{{ $nota->nota }}</td>
                        <td>
                            <a href="{{ route('notas.edit', $nota->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('notas.destroy', $nota->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

