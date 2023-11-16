<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;

class EmpresasController extends Controller
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
        $data = $request->validate([
            'nombre' => 'required|string',
            'ruc' => 'required|string',
            'direccion' => 'required|string',
            'nombre_contacto' => 'required|string',
            'telefono' => 'required|string',
            'redes' => 'string|nullable',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Añade esta línea para la validación del logo

        ]);

    
        if ($request->hasFile('logo')) {
            $imagenPath = $request->file('logo')->store('logos', 'public');
            $data['logo'] = $imagenPath;
        }

        Empresa::create($data);

        return redirect()->route('empresas.index')->with('success', 'Empresa creada con éxito.');
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
        $data = $request->validate([
            'nombre' => 'required|string',
            'ruc' => 'required|string',
            'direccion' => 'required|string',
            'nombre_contacto' => 'required|string',
            'telefono' => 'required|string',
            'redes' => 'string|nullable',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Añade esta línea para la validación del logo

        ]);


        if ($request->hasFile('logo')) {
            $imagenPath = $request->file('logo')->store('logos', 'public');
            $data['logo'] = $imagenPath;
        }

        $empresa->update($data);

        return redirect()->route('empresas.index')->with('success', 'Empresa actualizada con éxito.');
    }

    public function destroy(Empresa $empresa)
    {
        $empresa->delete();
        return redirect()->route('empresas.index')->with('success', 'Empresa eliminada con éxito.');
    }

    public function empresas_public()
    {
        $empresas = Empresa::all();
        return view('empresas.empresas_public', compact('empresas'));
    }
}
