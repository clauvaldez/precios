@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8 px-4 mt-4">
<h1 class="text-3xl font-semibold mb-6">Lista de Empresas</h1>

    <div class="flex flex-wrap -mx-4">
        @foreach($empresas as $empresa)
        <div class="w-full md:w-1/3 px-4 mb-8">
            <div class="bg-white rounded-lg shadow-md p-6">
                @if($empresa->logo)
                <img src="{{ asset('storage/' . $empresa->logo) }}" alt="Logo de la empresa" class="w-16 h-16 mx-auto mb-4 rounded-full">
                @else
                <div class="bg-gray-200 w-16 h-16 mx-auto mb-4 rounded-full flex items-center justify-center">
                    <span class="text-gray-500">Sin logo</span>
                </div>
                @endif
                <h2 class="text-xl font-semibold mb-2">{{ $empresa->nombre }}</h2>
                <p class="text-gray-600">{{ $empresa->direccion }}</p>
                <a href="{{ route('empresas.show', $empresa) }}" class="text-blue-500 block mt-4 hover:underline">Ver detalles</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
