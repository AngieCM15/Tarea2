@extends('layouts.app')

@section('title', 'Editar Empresa')

@section('content')
    <h1>Editar Empresa</h1>
    <form action="{{ route('empresas.update', $empresa) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $empresa->nombre }}" required>
        </div>
        <div class="form-group">
            <label for="ruc">RUC</label>
            <input type="text" class="form-control" id="ruc" name="ruc" value="{{ $empresa->ruc }}" required>
        </div>
        <div class="form-group">
            <label for="direccion">Dirección</label>
            <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $empresa->direccion }}">
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $empresa->telefono }}">
        </div>
        <div class="form-group">
            <label for="logo">Logo (opcional)</label>
            <input type="file" class="form-control" id="logo" name="logo" accept="image/*">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('empresas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
