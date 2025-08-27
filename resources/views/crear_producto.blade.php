@extends('layouts.app')

@section('title','Crear producto')

@section('content')
  <h1>Crear producto</h1>

  <form class="form" method="post" action="{{ route('productos.guardar') }}" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <label>Nombre de producto:</label>
      <input type="text" name="name" required value="{{ old('name') }}">
    </div>

    <div class="row">
      <label>Imagen:</label>
      <input type="file" name="image" accept=".jpg,.jpeg,.png,.webp" required>
    </div>

    <div class="row">
     <label>Empresa:</label>
     <select name="empresa_id" required>
        @foreach($empresas as $empresa)
            <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
        @endforeach
     </select>
    </div>


    <div class="row">
      <label>Precio:</label>
      <input type="number" name="price" step="0.01" min="0" required value="{{ old('price') }}">
    </div>

    <div class="row">
      <label>Stock:</label>
      <select name="stock" required>
        <option value="En Stock">En Stock</option>
        <option value="Agotado">Agotado</option>
      </select>
    </div>

    <div class="actions">
      <button class="btn" type="submit">Guardar</button>
      <a class="btn secondary" href="{{ route('catalogo') }}">Volver al catálogo</a>
    </div>
  </form>

  @if ($errors->any())
    <div class="alert">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
@endsection
