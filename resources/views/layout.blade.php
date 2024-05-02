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

        <div class="d-none-print">
            <div class="row flex-align-center" style="max-height: 300px;">
                <div class="cell-3 cell-md-one-third p-2"><a href="{{ route('home.index') }}"><img class="mw-75-md mw-50-xl d-block mx-auto mr-0-md" src="{{ url('https://w.owr.at/w-owr/wp-content/uploads/2022/11/OWR-Abziehbild.svg') }}"  style="max-height: 200px;"></a></div>
                <div class="cell-9 cell-md-two-third p-2 pt-5"><h1><span class="fg-owrRed">{{ Config::get('app.name', 'DateMark'); }}</span> <br /> <small class="d-none d-inline-md">{{ __('layout.subtitle') }}</small></h1></div>
            </div>
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


