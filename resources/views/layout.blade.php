<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    @include('partials._fileheader')
    <title>@yield('title')</title>
  </head>
  <body class="m4-cloak">
    <div class="container-fluid px-0 px-3-md">

        <!-- Header -->
        @include('partials._maintenance')
        <!-- Page Header -->
        @auth
            <header class="container-fluid bg-white px-0 d-none-print fixed-top">
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
        @endauth

        <div class="d-none-print d-flex flex-justify-center mt-5">
            <div class="d-flex flex-row flex-align-center align-items-center">
                <div class="p-2">
                    <img src="{{ url('https://w.owr.at/w-owr/wp-content/uploads/2022/11/OWR-Abziehbild.svg') }}" alt="Logo" width="100" height="100">
                </div>
                <div class="p-2">
                    <h1 class="m-0"><span class="fg-owrRed">{{ Config::get('app.name', 'DateMark'); }}</span></h1>
                </div>
            </div>
        </div>

        <div class="d-none-print">
            <div>
            @yield('menu')
            </div>
        </div>

        <!-- Inhalt -->
        <div>
            @yield('inhalt')
        </div>
    </div>
    <!-- Metro 4 -->
    <script src="{{ url('js/metro.min.js') }}"></script>
    @yield('scripts')
  </body>
</html>


