@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-semibold">Lista de Materiales</h1>
        <a href="{{ route('materiales.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md my-4 inline-block">Crear Material</a>
    </div>
    <table class="min-w-full bg-white rounded-lg shadow-xs">
        <thead>
            <tr>
                <th class="px-4 py-2 text-left">Nombre</th>
                <th class="px-4 py-2 text-left">Unidad de Medida</th>
                <th class="px-4 py-2 text-left">Precio Referencial</th>
                <th class="px-4 py-2 text-left">Fecha de Última Modificación</th>
                <th class="px-4 py-2 text-left">Imagen</th>
                <th class="px-4 py-2"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($materiales as $material)
            <tr>
                <td class="px-4 py-2">{{ $material->nombre }}</td>
                <td class="px-4 py-2">{{ $material->unidad_medida }}</td>
                <td class="px-4 py-2">{{ $material->precio_referencial }}</td>
                <td class="px-4 py-2">{{ $material->fecha_ultima_modificacion }}</td>
                <td class="px-4 py-2">{{ $material->imagen }}</td>
                <td class="px-4 py-2">
                    <a href="{{ route('materiales.show', $material) }}" class="text-blue-500">Ver</a>
                    <a href="{{ route('materiales.edit', $material) }}" class="text-green-500 ml-2">Editar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
