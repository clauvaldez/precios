@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-semibold mb-4">Detalles de la Categoría</h1>
        <div class="mb-4">
            <strong>Nombre:</strong> {{ $categoria->nombre }}
        </div>
        <div class="mt-4">
            <a href="{{ route('categorias.index') }}" class="text-blue-500">Volver a la lista</a>
        </div>
    </div>
@endsection
