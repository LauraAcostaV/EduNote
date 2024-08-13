@extends('layouts.app')

@section('title', 'Listado de Notas')

@section('content')
    <h2>Listado de Notas</h2>
    <a href="{{ route('notas.create') }}">Crear Nota</a>
    <ul>
        @foreach ($notas as $nota)
            <li>
                Estudiante: {{ $nota->estudiante->nombre }} - Materia: {{ $nota->materia->nombre }} - Calificación: {{ $nota->nota }}
                <a href="{{ route('notas.edit', $nota->id) }}">Editar</a>
                <form action="{{ route('notas.destroy', $nota->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
