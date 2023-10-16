@extends('layouts.app')
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Materiales') }}
    </h2>
</x-slot>

@section('content')
    <h1 class="text-2xl font-semibold mb-4">Agregar Material de Construcción</h1>
    <form method="post" action="{{ route('materiales.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="nombre" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre:</label>
            <input type="text" name="nombre" class="border w-full px-3 py-2 rounded-md">
        </div>
        <div class="mb-4">
    <label for="categoria_id" class="block text-sm font-medium text-gray-600">Categoría</label>
    <select name="categoria_id" id="categoria_id" class="form-select">
        @foreach($categorias as $categoria)
            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
        @endforeach
    </select>
</div>


        <div class="mb-4">
            <label for="unidad_medida" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Unidad de Medida:</label>
            <input type="text" name="unidad_medida" class="border w-full px-3 py-2 rounded-md">
        </div>
        <div class="mb-4">
            <label for="precio_referencial" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Precio Referencial:</label>
            <input type="number" name="precio_referencial" class="border w-full px-3 py-2 rounded-md">
        </div>
        <div class="mb-4">
            <label for="fecha_ultima_modificacion" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Fecha Última Modificación:</label>
            <input type="date" name="fecha_ultima_modificacion" class="border w-full px-3 py-2 rounded-md">
        </div>
        <div class="mb-4">
            <label for="imagen" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Imagen:</label>
            <input type="file" name="imagen" class="border w-full px-3 py-2 rounded-md">
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-md">Guardar</button>
    </form>
</div>
@endsection