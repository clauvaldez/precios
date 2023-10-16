@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-semibold mb-4">Detalles del Contratista</h1>
        <div class="mb-4">
            <strong>Nombre:</strong> {{ $contratista->nombre }}
        </div>
        <div class="mb-4">
            <strong>Contacto:</strong> {{ $contratista->contacto }}
        </div>
        <div class="mb-4">
            <strong>Datos Adicionales:</strong>
            <div>{!! $contratista->datos_adicionales !!}</div>
        </div>
        <div class="mt-4">
            <a href="{{ route('contratistas.index') }}" class="text-blue-500">Volver a la lista</a>
        </div>
    </div>
@endsection
