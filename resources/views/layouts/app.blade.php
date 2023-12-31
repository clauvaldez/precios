<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/cibowcfs27frz8y2zxqr5p8t3iinpt2jewrek882hvo2m25g/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
            plugins: 'code table lists',
            toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
        });
    </script>

</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">

        @auth
        @include('layouts.navigation')
        @else
        @include('layouts.navigationguest')
        @endauth

        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endif

        <!-- Page Content -->
        <main>
        @if(session('error'))
    <script type="text/javascript">
        alert('{{ session('error') }}');
    </script>
@endif

            @yield('content')
        </main>
    </div>
</body>

</html>