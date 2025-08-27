@extends('layouts.app')

@section('title', 'Lista de Empresas')

@section('content')
    <h1>Empresas</h1>
    <a href="{{ route('empresas.create') }}" class="btn btn-primary mb-3">Crear Empresa</a>
    <div class="row">
        @foreach($empresas as $empresa)
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="{{ asset('storage/' . $empresa->logo) }}" class="card-img-top" alt="Logo de {{ $empresa->nombre }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $empresa->nombre }}</h5>
                        <p class="card-text">RUC: {{ $empresa->ruc }}</p>
                        <p class="card-text">Dirección: {{ $empresa->direccion }}</p>
                        <p class="card-text">Teléfono: {{ $empresa->telefono }}</p>
                        <a href="{{ route('empresas.show', $empresa) }}" class="btn btn-info">Ver Detalles</a>
                        <a href="{{ route('empresas.edit', $empresa) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('empresas.destroy', $empresa) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
