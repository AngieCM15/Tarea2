@extends('layouts.app')

@section('title', 'Crear Empresa')

@section('content')
    <h1>Crear Empresa</h1>
    <form action="{{ route('empresas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre de la Empresa</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="ruc">RUC</label>
            <input type="text" class="form-control" id="ruc" name="ruc" required>
        </div>
        <div class="form-group">
            <label for="direccion">Dirección</label>
            <input type="text" class="form-control" id="direccion" name="direccion">
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" class="form-control" id="telefono" name="telefono">
        </div>
        <div class="form-group">
            <label for="logo">Logo</label>
            <input type="file" class="form-control" id="logo" name="logo" accept="image/*" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('empresas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
