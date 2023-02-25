<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        {{-- <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}

        <!-- Scripts -->
        @vite(['resources/css/bootstrap.css', 'resources/css/main.css', 'resources/js/app.js', 'resources/js/bootstrap.bundle.js'])
    </head>
    <body data-bs-theme="
    @if (isset($theme))
        {{ $theme }}
    @else
        'light'
    @endif

    " class="container-fluid bg-secondary-subtle px-0">

        <!-- Page Navigation -->
        <div class="container-fluid bg-body py-1 d-print-none">
            @include('partials._navbar')
        </div>
        <!-- Page Header -->
        <header class="d-print-none">
            <div class="container-fluid bg-body border-top border-bottom border-secondary-subtle">
                <!-- Page Heading -->
                @if (isset($header))
                <div class="container px-4 py-3">
                    {{ $header }}
                </div>
                @endif
            </div>
        </header>
        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </body>
</html>
