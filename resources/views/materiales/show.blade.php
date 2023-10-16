@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-semibold">Detalles del Material de Construcción</h1>
    <ul class="list-disc pl-5 mt-4">
        <li><strong>Nombre:</strong> {{ $material->nombre }}</li>
        <li><strong>Unidad de Medida:</strong> {{ $material->unidad_medida }}</li>
        <li><strong>Precio Referencial:</strong> {{ $material->precio_referencial }}</li>
        <li><strong>Fecha Última Modificación:</strong> {{ $material->fecha_ultima_modificacion }}</li>
        @if ($material->imagen)
            <li><strong>Imagen:</strong></li>
            <img src="{{ asset('storage/' . $material->imagen) }}" alt="Imagen del material" class="max-w-xs my-2">
        @endif
    </ul>
    <a href="{{ route('materiales.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md mt-4 inline-block">Volver</a>
</div>
@endsection