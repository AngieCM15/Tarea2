<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpresaController extends Controller
{
    public function index()
    {
        $empresas = Empresa::all();
        return view('empresas.index', compact('empresas'));
    }

    public function create()
    {
        return view('empresas.create');
    }

    public function store(Request $request)
    {
      $request->validate([
        'nombre' => 'required',
        'ruc' => 'required|unique:empresas',
        'direccion' => 'nullable',
        'telefono' => 'nullable',
        'logo' => 'required|image|max:2048', // Validación para el logo
      ]);

     $data = $request->all();
    
     // Manejo de la carga del logo
     if ($request->hasFile('logo')) {
        $data['logo'] = $request->file('logo')->store('logos', 'public'); // Guardar el logo en el disco público
     }

     Empresa::create($data); // Crear la empresa con los datos

     return redirect()->route('empresas.index')->with('success', 'Empresa creada correctamente.');
    }


    public function show(Empresa $empresa)
    {
        return view('empresas.show', compact('empresa'));
    }

    public function edit(Empresa $empresa)
    {
        return view('empresas.edit', compact('empresa'));
    }

    public function update(Request $request, Empresa $empresa)
    {
        $request->validate([
            'nombre' => 'required',
            'ruc' => 'required|unique:empresas,ruc,' . $empresa->id,
            'direccion' => 'nullable',
            'telefono' => 'nullable',
            'logo' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('logo')) {
            if ($empresa->logo) {
                Storage::disk('public')->delete($empresa->logo);
            }
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $empresa->update($data);

        return redirect()->route('empresas.index')->with('success', 'Empresa actualizada correctamente.');
    }

    public function destroy(Empresa $empresa)
    {
        if ($empresa->logo) {
            Storage::disk('public')->delete($empresa->logo);
        }

        $empresa->delete();

        return redirect()->route('empresas.index')->with('success', 'Empresa eliminada correctamente.');
    }
}
