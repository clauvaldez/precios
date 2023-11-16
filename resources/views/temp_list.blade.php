@extends('layouts.app')

@section('content')

<div class="container mx-auto">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-semibold">Lista Temporal</h1>
        @if (count($tempList) > 0)
        <form method="POST" action="{{ route('clear-temp-list') }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md">Vaciar Lista</button>
        </form>
        @endif
    </div>

    @php
    $totalPrice = 0; // Inicializa el total en 0
    @endphp
    <table class="min-w-full bg-white rounded-lg shadow-xs">
        <thead>
            <tr>
                <th class="px-4 py-2 text-left">Nombre</th>
                <th class="px-4 py-2 text-left">Unidad de Medida</th>
                <th class="px-4 py-2 text-left">Precio Referencial</th>
                <th class="px-4 py-2 text-left">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @php
            $totalPrice = 0; // Inicializa el total en 0
            @endphp
            @foreach($tempList as $material)
            <tr>
                <td class="px-4 py-2">{{ $material->nombre }}</td>
                <td class="px-4 py-2">{{ $material->unidad_medida }}</td>
                <td class="px-4 py-2">Gs. {{ number_format($material->precio_referencial, 2, ',', '.') }}</td>
                <td class="px-4 py-2">
                    <form method="POST" action="{{ route('remove-from-list', ['materialId' => $material->id]) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 underline">Eliminar</button>
                    </form>
                </td>
            </tr>
            @php
            $totalPrice += $material->precio_referencial; // Suma el precio referencial al total
            @endphp
            @endforeach
        </tbody>
    </table>

    <!-- Muestra el total de precios referenciales -->
    <p class="text-lg font-semibold mt-4 gap-4">Total: Gs. {{ number_format($totalPrice, 2, ',', '.') }}</p>
    @if (count($tempList) > 0)
    @auth
        <div class="container">
            <div class="flex justify-content items-center mt-12 gap-4">
                <form action="{{ route('solicitarcotizacion') }}" method="POST">
                    <select name="empresa" id="">
                        <option value="">Seleccionar Empresa</option>
                        @foreach($empresas as $empresa)
                            <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
                        @endforeach
                    </select>

                    @csrf
                    @method('POST')
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md">Solicitar Cotización</button>
                </form>

                <form action="{{ route('descargarlista') }}" method="POST">
                    @csrf
                    @method('POST')
                    <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded-md">Descargar Lista</button>
                </form>
            </div>
        </div>
    @else
    
        <div class="container">
            
            <div class="flex justify-content items-center mt-12 gap-4">

                <div class="blurry-effect">
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md">Solicitar Cotización</button>
                    <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded-md">Descargar Lista</button>
                    <!-- Contenido desenfocado -->
                </div>
                <p class="text-gray-500">Registrate o Inicia sesión para acceder a estas funciones</p>

            </div>
        </div>
        <style>
            .blurry-effect {
                filter: blur(1.5px); /* Puedes ajustar el valor de blur según tus preferencias */
            }
        </style>
    @endauth
@endif





</div>

@endsection