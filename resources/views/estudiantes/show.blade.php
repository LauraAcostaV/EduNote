@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles del Estudiante</h1>
        <div class="card">
            <div class="card-header">
                <h2>{{ $estudiante->nombre }} {{ $estudiante->apellido }}</h2>
            </div>
            <div class="card-body">
                <p><strong>Fecha de Nacimiento:</strong> {{ $estudiante->fecha_nacimiento }}</p>
                <p><strong>Email:</strong> {{ $estudiante->email }}</p>
                
                <h3>Cursos Inscritos</h3>
                <ul>
                    @forelse ($estudiante->cursos as $curso)
                        <li>{{ $curso->nombre }} - {{ $curso->descripcion }}</li>
                    @empty
                        <li>No estás inscrito en ningún curso.</li>
                    @endforelse
                </ul>
            </div>
            <div class="card-footer">
                <a href="{{ route('estudiantes.edit', $estudiante->id) }}" class="btn btn-primary">Editar</a>
                <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary">Volver</a>
            </div>
        </div>
    </div>
@endsection

