@extends('layouts.app')

@section('content')
@if ($errors->any())
    <div class="mb-4">
        <ul class="text-red-500">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="container mx-auto">
        <h1 class="text-2xl font-semibold mb-4">Crear Nueva Empresa</h1>
        <form action="{{ route('empresas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="nombre" class="block text-sm font-medium text-gray-600">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-input">
            </div>
            <div class="mb-4">
                <label for="ruc" class="block text-sm font-medium text-gray-600">RUC</label>
                <input type="text" name="ruc" id="ruc" class="form-input">
            </div>
            <div class="mb-4">
                <label for="direccion" class="block text-sm font-medium text-gray-600">Dirección</label>
                <input type="text" name="direccion" id="direccion" class="form-input">
            </div>
            <div class="mb-4">
                <label for="nombre_contacto" class="block text-sm font-medium text-gray-600">Nombre de Contacto</label>
                <input type="text" name="nombre_contacto" id="nombre_contacto" class="form-input">
            </div>
            <div class="mb-4">
                <label for="telefono" class="block text-sm font-medium text-gray-600">Teléfono</label>
                <input type="text" name="telefono" id="telefono" class="form-input">
            </div>
            <div class="mb-4">
                <label for="redes" class="block text-sm font-medium text-gray-600">Redes</label>
                <input type="text" name="redes" id="redes" class="form-input">
            </div>
            <div class="mb-4">
    <label for="logo" class="block text-sm font-medium text-gray-600">Logo:</label>
    <input type="file" name="logo" id="logo" class="form-input border rounded-md p-2">
</div>

            <div>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Crear Empresa</button>
            </div>
        </form>
    </div>
@endsection
