@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-semibold">Lista de Categorías</h1>
            <a href="{{ route('categorias.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md my-4 inline-block">Crear Categoría</a>
        </div>
        <table class="min-w-full bg-white rounded-lg shadow-xs">
            <thead>
                <tr>
                    <th class="px-4 py-2 text-left">Nombre</th>
                    <th class="px-4 py-2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($categorias as $categoria)
                <tr>
                    <td class="px-4 py-2">{{ $categoria->nombre }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('categorias.show', $categoria) }}" class="text-blue-500">Ver</a>
                        <a href="{{ route('categorias.edit', $categoria) }}" class="text-green-500 ml-2">Editar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
