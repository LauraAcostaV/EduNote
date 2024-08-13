@extends('layouts.app')

@section('title', 'Listado de Cursos')

@section('content')
    <div class="container">
        <h2>Listado de Cursos</h2>
        <a href="{{ route('cursos.create') }}" class="btn btn-primary mb-3">Crear Curso</a>
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
                @foreach ($cursos as $curso)
                    <tr>
                        <td>{{ $curso->id }}</td>
                        <td>{{ $curso->nombre }}</td>
                        <td>{{ $curso->descripcion }}</td>
                        <td>
                            <a href="{{ route('cursos.edit', $curso->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('cursos.destroy', $curso->id) }}" method="POST" style="display: inline;">
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


