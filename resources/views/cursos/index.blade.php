@extends('layouts.app')

@section('title', 'Listado de Cursos')

@section('content')
    <h2>Listado de Cursos</h2>
    <a href="{{ route('cursos.create') }}">Crear Curso</a>
    <ul>
        @foreach ($cursos as $curso)
            <li>
                {{ $curso->nombre }} - {{ $curso->descripcion }}
                <a href="{{ route('cursos.edit', $curso->id) }}">Editar</a>
                <form action="{{ route('cursos.destroy', $curso->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection

