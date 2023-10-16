@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-semibold mb-4">Editar Contratista</h1>
        <form action="{{ route('contratistas.update', $contratista) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="nombre" class="block text-sm font-medium text-gray-600">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-input" value="{{ $contratista->nombre }}">
            </div>
            <div class="mb-4">
                <label for="contacto" class="block text-sm font-medium text-gray-600">Contacto</label>
                <input type="text" name "contacto" id="contacto" class="form-input" value="{{ $contratista->contacto }}">
            </div>
            <div class="mb-4">
                <label for="datos_adicionales" class="block text-sm font-medium text-gray-600">Datos Adicionales</label>
                <textarea name="datos_adicionales" id="myeditorinstance">{{ $contratista->datos_adicionales }}</textarea>
                <!-- Agrega aquí el campo del editor WYSIWYG y prellénalo con $contratista->datos_adicionales -->
            </div>
            <div>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover-bg-blue-600">Actualizar Contratista</button>
            </div>
        </form>
    </div>
@endsection
