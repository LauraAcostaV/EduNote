@extends('layouts.app')

@section('title', 'Crear Materia')

@section('content')
    <h2>Crear Materia</h2>
    <form action="{{ route('materias.store') }}" method="POST">
        @csrf
        <label for="nombre">Nombre de la Materia:</label>
        <input type="text" name="nombre" id="nombre" required>

        <label for="descripcion">Descripción:</label>
        <input type="text" name="descripcion" id="descripcion">

        <button type="submit">Guardar</button>
    </form>
@endsection