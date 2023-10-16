@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-semibold">Lista de Contratistas</h1>
            <a href="{{ route('contratistas.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md my-4 inline-block">Crear Contratista</a>
        </div>
        <table class="min-w-full bg-white rounded-lg shadow-xs">
            <thead>
                <tr>
                    <th class="px-4 py-2 text-left">Nombre</th>
                    <th class="px-4 py-2 text-left">Contacto</th>
                    <th class="px-4 py-2 text-left">Datos Adicionales</th>
                    <th class="px-4 py-2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($contratistas as $contratista)
                <tr>
                    <td class="px-4 py-2">{{ $contratista->nombre }}</td>
                    <td class="px-4 py-2">{{ $contratista->contacto }}</td>
                    <td class="px-4 py-2">{!! $contratista->datos_adicionales !!}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('contratistas.show', $contratista) }}" class="text-blue-500">Ver</a>
                        <a href="{{ route('contratistas.edit', $contratista) }}" class="text-green-500 ml-2">Editar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
