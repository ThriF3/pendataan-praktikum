<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Praktik U - {{ str_replace(['.', '_'], ' ', Route::currentRouteName()); }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <div
            @if (Auth::user()->role == 'mahasiswa')
            @else
            class="flex">
            @endif
            @if (Auth::user()->role == 'mahasiswa')
            @include('layouts.navigation')
            @else
            @include('components.admin-sidebar')
            @endif

            <div 
            @if (Auth::user()->role == 'mahasiswa')
            class="w-full p-4"
            @else
            class="w-full p-4 sm:ml-64"
            @endif
            >

                <!-- Page Heading -->
                @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
                @endif

                <!-- Page Content -->
                <main>
                    {{ $slot }}
                </main>

            </div>
        </div>
    </div>
</body>

</html>