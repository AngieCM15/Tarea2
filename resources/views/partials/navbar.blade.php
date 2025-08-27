<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <div class="navbar">
  <div class="brand"><a href="{{ route('catalogo') }}">La Bodega · Catálogo</a></div>
  <nav>
    <a href="{{ route('catalogo') }}">Inicio</a>
    <a href="{{ route('productos.crear') }}">Crear producto</a>
  </nav>
</div>
</body>
</html>