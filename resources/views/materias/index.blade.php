@extends('layouts.app')

@section('title', 'Listado de Materias')

@section('content')
    <div class="container">
        <h2>Listado de Materias</h2>
        <a href="{{ route('materias.create') }}" class="btn btn-primary mb-3">Crear Materia</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($materias as $materia)
                    <tr>
                        <td>{{ $materia->id }}</td>
                        <td>{{ $materia->nombre }}</td>
                        <td>{{ $materia->descripcion }}</td>
                        <td>
                            <a href="{{ route('materias.edit', $materia->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('materias.destroy', $materia->id) }}" method="POST" style="display: inline;">
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
