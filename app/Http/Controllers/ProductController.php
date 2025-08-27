<?php

    namespace App\Http\Controllers;

    use App\Models\Product;
    use App\Models\Empresa; // Aseguramos que se use el modelo Empresa
    use Illuminate\Http\Request;
    use Illuminate\Support\Str;
    use Illuminate\Support\Facades\Storage; // Importamos la fachada Storage

    class ProductController extends Controller
    {
        public function index(Request $request)
        {
            $empresa = $request->get('empresa');
            $q = $request->get('q');

            $empresas = Empresa::orderBy('nombre')->get(); // Cambiado a 'nombre'

            // Usamos la relación 'empresa' en lugar de 'company'
            $productos = Product::with('empresa')
                ->when($empresa, fn($query) => $query->where('empresa_id', $empresa))
                ->when($request->filled('q'), fn($query) => $query->where('nombre', 'like', '%'.$request->q.'%'))
                ->orderByDesc('created_at')
                ->get();

            return view('catalogo', compact('productos', 'empresas', 'empresa', 'q'));
        }

        public function create()
        {
         $empresas = Empresa::all(); // Obtener todas las empresas
         return view('crear_producto', compact('empresas')); // Pasar las empresas a la vista
        }


        public function store(Request $request)
        {
            $request->validate([
                'nombre' => 'required|string|max:200',
                'empresa_id' => 'required|exists:empresas,id', // Aseguramos que exista en la tabla 'empresas'
                'precio' => 'required|numeric|min:0',
                'stock' => 'required|in:En Stock,Agotado',
                'imagen' => 'required|image|mimes:jpeg,png,jpg,webp|max:3072',
            ]);

            $imagePath = null;
            if ($request->hasFile('imagen')) {
                // Usamos el Storage de Laravel para guardar la imagen
                // Esto la guarda en storage/app/public/uploads
                $imagePath = $request->file('imagen')->store('uploads', 'public');
            }

            Product::create([
                'nombre' => $request->nombre,
                'empresa_id' => $request->empresa_id,
                'precio' => $request->precio,
                'stock' => $request->stock,
                'imagen' => $imagePath, // Guardamos la ruta relativa
            ]);

            return redirect()->route('catalogo')->with('success', 'Producto guardado correctamente.');
        }
    }
    