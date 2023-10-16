<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contratista;

class ContratistasController extends Controller
{
    public function index()
    {
        $contratistas = Contratista::all();
        return view('contratistas.index', compact('contratistas'));
    }

    public function create()
    {
        return view('contratistas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'contacto' => 'required',
            'datos_adicionales' => 'nullable',
        ]);

        Contratista::create($request->all());

        return redirect()->route('contratistas.index')
            ->with('success', 'Contratista creado satisfactoriamente');
    }

    public function show(Contratista $contratista)
    {
        return view('contratistas.show', compact('contratista'));
    }

    public function edit(Contratista $contratista)
    {
        return view('contratistas.edit', compact('contratista'));
    }

    public function update(Request $request, Contratista $contratista)
    {
        $request->validate([
            'nombre' => 'required',
            'contacto' => 'required',
            'datos_adicionales' => 'nullable',
        ]);

        $contratista->update($request->all());

        return redirect()->route('contratistas.index')
            ->with('success', 'Contratista actualizado satisfactoriamente');
    }

    public function destroy(Contratista $contratista)
    {
        $contratista->delete();

        return redirect()->route('contratistas.index')
            ->with('success', 'Contratista eliminado satisfactoriamente');
    }
}
