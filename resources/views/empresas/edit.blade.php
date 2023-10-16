@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-semibold mb-4">Editar Empresa</h1>
        <form action="{{ route('empresas.update', $empresa) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="nombre" class="block text-sm font-medium text-gray-600">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-input" value="{{ $empresa->nombre }}">
            </div>
            <div class="mb-4">
                <label for="ruc" class="block text-sm font-medium text-gray-600">RUC</label>
                <input type="text" name="ruc" id="ruc" class="form-input" value="{{ $empresa->ruc }}">
            </div>
            <div class="mb-4">
                <label for="direccion" class="block text-sm font-medium text-gray-600">Dirección</label>
                <input type="text" name="direccion" id="direccion" class="form-input" value="{{ $empresa->direccion }}">
            </div>
            <div class="mb-4">
                <label for="nombre_contacto" class="block text-sm font-medium text-gray-600">Nombre de Contacto</label>
                <input type="text" name="nombre_contacto" id="nombre_contacto" class="form-input" value="{{ $empresa->nombre_contacto }}">
            </div>
            <div class="mb-4">
                <label for="telefono" class="block text-sm font-medium text-gray-600">Teléfono</label>
                <input type="text" name="telefono" id="telefono" class="form-input" value="{{ $empresa->telefono }}">
            </div>
            <div class="mb-4">
                <label for="redes" class="block text-sm font-medium text-gray-600">Redes</label>
                <input type="text" name="redes" id="redes" class="form-input" value="{{ $empresa->redes }}">
            </div>
            <div>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Actualizar Empresa</button>
            </div>
        </form>
    </div>
@endsection
