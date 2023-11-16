@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8 px-4 mt-4">
    <h1 class="text-3xl font-semibold mb-6">Lista de Contratistas</h1>

    <div class="flex flex-wrap -mx-4">
        @foreach($contratistas as $contratista)
        <div class="w-full md:w-1/3 px-4 mb-8">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold mb-2">{{ $contratista->nombre }}</h2>
                @auth
                    <p class="text-gray-600">{{ $contratista->contacto }}</p>
                @else
                    <p class="text-gray-600">Inicia sesión para ver el contacto</p>
                @endauth                <p class="text-gray-600">{!! $contratista->datos_adicionales !!}</p>
                <a href="{{ route('contratistas.show', $contratista) }}" class="text-blue-500 block mt-4 hover:underline">Ver detalles</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
