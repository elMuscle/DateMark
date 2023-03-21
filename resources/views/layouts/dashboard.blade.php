<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>{{ Config::get('app.name', 'DateMark'); }}</title>

        <!-- Metro Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="metro4:locale" content="de-DE">

        <!-- Stylesheets -->
        @vite(['resources/css/metro-all.min.css', 'resources/css/main.css', 'resources/js/metro.min.js'])
        <!-- Laravel -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body class="bg-light">
        <!-- Page Header -->
        <header class="container-fluid bg-white px-0 d-none-print">
            <!-- Page Navigation -->
            <div class="container pt-3">
                @include('partials._navigation')
            </div>
            <div class="border-top border-bottom bd-lightGray mt-3">
                <!-- Page Heading -->
                @if (isset($header))
                <div class="container px-7 pt-3 pt-2">
                    {{ $header }}
                </div>
                @endif
            </div>
        </header>
        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
        <!--<script src="{{ url('js/metro.min.js') }}"></script>-->
    </body>
</html>
