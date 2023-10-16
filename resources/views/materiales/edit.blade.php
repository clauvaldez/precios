@extends('layouts.app')
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Materiales') }}
    </h2>
</x-slot>

@section('content')
    <h1 class="text-2xl font-semibold">Editar Material de Construcción</h1>
    <form method="post" action="{{ route('materiales.update', $material) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="nombre" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre:</label>
            <input type="text" name="nombre" class="border w-full px-3 py-2 rounded-md" value="{{ $material->nombre }}">
        </div>
        <div class="mb-4">
            <label for="unidad_medida" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Unidad de Medida:</label>
            <input type="text" name="unidad_medida" class="border w-full px-3 py-2 rounded-md" value="{{ $material->unidad_medida }}">
        </div>
        <div class="mb-4">
            <label for="precio_referencial" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Precio Referencial:</label>
            <input type="number" name="precio_referencial" class="border w-full px-3 py-2 rounded-md" value="{{ $material->precio_referencial }}">
        </div>
        <div class="mb-4">
            <label for="fecha_ultima_modificacion" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Fecha Última Modificación:</label>
            <input type="date" name="fecha_ultima_modificacion" class="border w-full px-3 py-2 rounded-md" value="{{ $material->fecha_ultima_modificacion }}">
        </div>
        <div class="mb-4">
            <label for="imagen" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Imagen:</label>
            <input type="file" name="imagen" class="border w-full px-3 py-2 rounded-md">
            @if ($material->imagen)
                <img src="{{ asset('storage/' . $material->imagen) }}" alt="Imagen del material" class="max-w-xs my-2">
            @else
                <p>No hay imagen disponible.</p>
            @endif
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md">Actualizar</button>
        <a href="{{ route('materiales.index') }}" class="bg-red-500 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-md">Cancelar</a>

    </form>
</div>
@endsection