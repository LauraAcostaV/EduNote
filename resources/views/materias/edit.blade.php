@extends('layouts.app')

@section('title', 'Editar Materia')

@section('content')
    <h2>Editar Materia</h2>
    <form action="{{ route('materias.update', $materia->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nombre">Nombre de la Materia:</label>
        <input type="text" name="nombre" id="nombre" value="{{ $materia->nombre }}" required>

        <label for="descripcion">Descripción:</label>
        <input type="text" name="descripcion" id="descripcion" value="{{ $materia->descripcion }}">

        <button type="submit">Actualizar</button>
    </form>
@endsection