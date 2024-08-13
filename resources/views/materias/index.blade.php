@extends('layouts.app')

@section('title', 'Listado de Materias')

@section('content')
    <h2>Listado de Materias</h2>
    <a href="{{ route('materias.create') }}">Crear Materia</a>
    <ul>
        @foreach ($materias as $materia)
            <li>
                {{ $materia->nombre }} - {{ $materia->descripcion }}
                <a href="{{ route('materias.edit', $materia->id) }}">Editar</a>
                <form action="{{ route('materias.destroy', $materia->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection