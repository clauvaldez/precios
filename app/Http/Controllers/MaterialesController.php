<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;
use App\Models\Categoria;

class MaterialesController extends Controller
{
    public function index()
    {
        $materiales = Material::all();
        return view('materiales.index', compact('materiales'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('materiales.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string',
            'unidad_medida' => 'required|string',
            'precio_referencial' => 'required|numeric',
            'fecha_ultima_modificacion' => 'required|date',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'categoria_id' => 'required', // Agregar la validación de categoría
        ]);

        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('imagenes', 'public');
            $data['imagen'] = $imagenPath;
        }

        Material::create($data);

        return redirect()->route('materiales.index')->with('success', 'Material creado con éxito.');
    }

    public function show(Material $material)
    {
        return view('materiales.show', compact('material'));
    }

    public function edit(Material $material)
    {
        $categorias = Categoria::all();
        return view('materiales.edit', compact('material', 'categorias'));
    }

    public function update(Request $request, Material $material)
    {
        $data = $request->validate([
            'nombre' => 'required|string',
            'unidad_medida' => 'required|string',
            'precio_referencial' => 'required|numeric',
            'fecha_ultima_modificacion' => 'required|date',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'categoria_id' => 'required', // Agregar la validación de categoría
        ]);

        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('imagenes', 'public');
            $data['imagen'] = $imagenPath;
        }

        $material->update($data);

        return redirect()->route('materiales.index')->with('success', 'Material actualizado con éxito.');
    }

    public function destroy(Material $material)
    {
        $material->delete();
        return redirect()->route('materiales.index')->with('success', 'Material eliminado con éxito.');
    }
}
