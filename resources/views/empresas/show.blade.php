@extends('layouts.app')

@section('title', 'Detalles de la Empresa')

@section('content')
    <h1>Detalles de la Empresa</h1>
    <div class="card">
        <div class="card-header">
            <h2>{{ $empresa->nombre }}</h2>
            <img src="{{ asset('storage/' . $empresa->logo) }}" alt="Logo" style="width: 100px;">
        </div>
        <div class="card-body">
            <p><strong>RUC:</strong> {{ $empresa->ruc }}</p>
            <p><strong>Dirección:</strong> {{ $empresa->direccion }}</p>
            <p><strong>Teléfono:</strong> {{ $empresa->telefono }}</p>
            <a href="{{ route('empresas.edit', $empresa) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('empresas.index') }}" class="btn btn-secondary">Volver a Empresas</a>
        </div>
    </div>
@endsection
