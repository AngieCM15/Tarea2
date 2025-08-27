@extends('layouts.app')

@section('title','Catálogo')

@section('content')
  <h1>Promociones del mes</h1>

  <div class="toolbar">
    <form method="get" style="display:flex; gap:8px; align-items:center;">
      <select name="company">
        <option value="">Todas las empresas</option>
        @foreach($companies as $c)
          <option value="{{ $c->id }}" {{ (int)$company === $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
        @endforeach
      </select>
      <input type="text" name="q" placeholder="Buscar producto..." value="{{ $q ?? '' }}">
      <button class="btn secondary" type="submit">Filtrar</button>
    </form>
  </div>

  <div class="grid">
    @forelse($products as $p)
      <article class="card">
        <div class="thumb">
          <img src="{{ $p->imagen ? asset('storage/' . $p->imagen) : asset('img/placeholder.png') }}" alt="{{ $p->nombre }}">
        </div>
        <div class="body">
          <div class="title">{{ $p->name }}</div>
          <div class="meta">{{ $p->company->name ?? '' }}</div>
          <div style="display:flex; align-items:center; justify-content:space-between; gap:8px">
            <div class="price">S/ {{ number_format($p->price,2) }}</div>
            <span class="badge {{ $p->stock==='En Stock' ? 'in':'out' }}">{{ $p->stock }}</span>
          </div>
        </div>
      </article>
    @empty
      <div class="alert">No hay productos. ¡Agrega el primero!</div>
    @endforelse
  </div>
@endsection
