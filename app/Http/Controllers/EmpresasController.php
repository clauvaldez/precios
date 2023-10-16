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
        ]);

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
        ]);

        $empresa->update($data);

        return redirect()->route('empresas.index')->with('success', 'Empresa actualizada con éxito.');
    }

    public function destroy(Empresa $empresa)
    {
        $empresa->delete();
        return redirect()->route('empresas.index')->with('success', 'Empresa eliminada con éxito.');
    }
}
