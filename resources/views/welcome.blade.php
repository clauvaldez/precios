@extends('layouts.app')
<link href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css" rel="stylesheet">

@section('content')

<div class="container mx-auto">
    
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-semibold">Lista de Materiales</h1>
        <a href="{{ route('view-temp-list') }}" class="bg-green-500 text-white px-4 py-2 rounded-md">Cotizar</a>
    </div>
    <table id="materialsTable" class="min-w-full bg-white rounded-lg shadow-xs">
        <thead>
            <tr>
                <th class="px-4 py-2 text-left">Nombre</th>
                <th class="px-4 py-2 text-left">Unidad de Medida</th>
                <th class="px-4 py-2 text-left">Precio Referencial</th>
                <th class="px-4 py-2 text-left">Fecha de Última Modificación</th>
                <th class="px-4 py-2 text-left">Imagen</th>
                <th class="px-4 py-2 text-left">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($materiales as $material)
            <tr>
                <td class="px-4 py-2">{{ $material->nombre }}</td>
                <td class="px-4 py-2">{{ $material->unidad_medida }}</td>
                <td class="px-4 py-2">Gs. {{ number_format($material->precio_referencial, 2, ',', '.') }}</td>
                <td class="px-4 py-2">{{ $material->fecha_ultima_modificacion }}</td>
                <td class="px-4 py-2">
                    <img src="{{ asset('storage/' . $material->imagen) }}" alt="Imagen del material" class="h-8 material-image" data-material="{{ asset('storage/' . $material->imagen) }}">
                </td>
                <td class="px-4 py-2">
                    <a href="{{ route('add-to-list', ['materialId' => $material->id]) }}" class="text-blue-500 underline">
                        Agregar a lista</a> 
                     || Sugerir Cambio
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div id="imageModal" class="fixed z-10 inset-0 invisible overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>
        <div class="inline-block align-middle bg-white overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:w-full" id="modal-container">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                    <div class="mt-2">
                        <img id="modalImage" src="" alt="Imagen del material">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('.openModal').on('click', function (e) {
            $('#interestModal').removeClass('invisible');
        });
        $('.closeModal').on('click', function (e) {
            $('#interestModal').addClass('invisible');
        });

        $('.material-image').on('click', function () {
            var imageUrl = $(this).data('material');
            var img = new Image();
            img.src = imageUrl;
            img.onload = function() {
                var container = $('#modal-container');
                container.css('max-width', img.width + 'px');
                container.css('max-height', img.height + 'px');
                $('#modalImage').attr('src', imageUrl);
                $('#imageModal').removeClass('invisible');
            };
        });

        $('#imageModal').on('click', function () {
            $('#imageModal').addClass('invisible');
        });

        //let table2 = new DataTable('#productos');

        $.getJSON("{{ asset('json/es-MX.json') }}", function(idiomaDataTable) {
            // Inicializa DataTable con el idioma cargado desde el archivo JSON
            let table2 = $('#materialsTable').DataTable({
                dom: 'Bfrtip',
                language: idiomaDataTable,
                order: [
                    [0, 'desc'] // Ordena la primera columna en orden descendente
                ],
                buttons: [
                    ''
                ],
                "paging": true,
                "pageLength": 50,
            });
            let data = table2.row(this).data();
            table2.on('click', 'tbody tr', function() {

                //alert('You clicked on ' + data[0] + "'s row");
            });
        });

    });
</script>

@endsection
