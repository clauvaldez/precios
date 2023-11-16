@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-semibold">Lista de Empresas</h1>
        <a href="{{ route('empresas.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md my-4 inline-block">Crear Empresa</a>
    </div>
    <table class="min-w-full bg-white rounded-lg shadow-xs">
        <thead>
            <tr>
                                <th class="px-4 py-2 text-left">Logo</th>

                <th class="px-4 py-2 text-left">Nombre</th>
                <th class="px-4 py-2 text-left">RUC</th>
                <th class="px-4 py-2 text-left">Dirección</th>
                <th class="px-4 py-2 text-left">Nombre de Contacto</th>
                <th class="px-4 py-2 text-left">Teléfono</th>
                <th class="px-4 py-2 text-left">Redes</th>
                <th class="px-4 py-2"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($empresas as $empresa)
            <tr>
            <td class="px-4 py-2">
                    @if($empresa->logo)
                        <img src="{{ asset('storage/' . $empresa->logo) }}" alt="Logo de la empresa" class="w-8 h-8 rounded-full">
                    @else
                        <span class="text-gray-400">Sin logo</span>
                    @endif
                </td>
                <td class="px-4 py-2">{{ $empresa->nombre }}</td>
                <td class="px-4 py-2">{{ $empresa->ruc }}</td>
                <td class="px-4 py-2">{{ $empresa->direccion }}</td>
                <td class="px-4 py-2">{{ $empresa->nombre_contacto }}</td>
                <td class="px-4 py-2">{{ $empresa->telefono }}</td>
                <td class="px-4 py-2">{{ $empresa->redes }}</td>
                <td class="px-4 py-2">
                    <a href="{{ route('empresas.show', $empresa) }}" class="text-blue-500">Ver</a>
                    <a href="{{ route('empresas.edit', $empresa) }}" class="text-green-500 ml-2">Editar</a>
                    <a href="{{ route('empresas.destroy', $empresa) }}" onclick="return confirm('¿Estás seguro de que quieres eliminar esta empresa?')" class="text-red-500 ml-2 hover:underline">Eliminar</a>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection