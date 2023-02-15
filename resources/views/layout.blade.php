<!DOCTYPE html>
<html lang="de">
  <head>
    @include('partials._fileheader')
    <title>@yield('title')</title>
  </head>
  <body class="m4-cloak">
    <div class="container-fluid">

            @include('partials._adminmenu')

        <!-- Header -->
        @include('partials._maintenance')
        <header>
            <div class="row flex-align-center">
            <div class="cell-3 cell-md-one-third p-2"><a href="{{ route('home.index') }}"><img class="mw-75-md mw-50-xl d-block mx-auto mr-0-md" src="{{ url('img/logo-datemark.png') }}" ></a></div>
            <div class="cell-9 cell-md-two-third p-2 pt-5"><h1><span class="fg-owrRed">{{ Config::get('app.name', 'DateMark'); }}</span> <br /> <small class="d-none d-inline-md">poll, sign, edit, repeat, ...</small></h1></div>
            </div>
            <div>
            @yield('menu')
            </div>
        </header>
        <!-- Inhalt -->
        <div>
            @yield('inhalt')
            @include('partials._footer')
        </div>
    </div>
    <!-- Metro 4 -->
    <script src="{{ url('js/metro.min.js') }}"></script>
    @yield('scripts')
  </body>
</html>


