@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-semibold mb-4">Detalles de la Empresa</h1>
        <div class="mb-4">
            <strong>Nombre:</strong> {{ $empresa->nombre }}
        </div>
        <div class="mb-4">
            <strong>RUC:</strong> {{ $empresa->ruc }}
        </div>
        <div class="mb-4">
            <strong>Dirección:</strong> {{ $empresa->direccion }}
        </div>
        <div class="mb-4">
            <strong>Nombre de Contacto:</strong> {{ $empresa->nombre_contacto }}
        </div>
        <div class="mb-4">
            <strong>Teléfono:</strong> {{ $empresa->telefono }}
        </div>
        <div class="mb-4">
            <strong>Redes:</strong> {{ $empresa->redes }}
        </div>
        <div class="mt-4">
            <a href="{{ route('empresas.index') }}" class="text-blue-500">Volver a la lista</a>
        </div>
    </div>
@endsection
