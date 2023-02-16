<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap w/ Vite</title>
    @vite(['resources/css/bootstrap.css', 'resources/css/main.css', 'resources/js/app.js', 'resources/js/bootstrap.bundle.js'])
  </head>
  <body data-bs-theme="light">
    <x-navbar>
        <x-navbar-link :href="route('dashboard')" :active="request()->routeIs('test')">
            Dashboard
        </x-navbar-link>
        <x-navbar-link :href="route('members.index')" :active="request()->routeIs('dashboard')">
            Dashboard
        </x-navbar-link>
        <x-navbar-link :href="route('tpolls.create')" :active="request()->routeIs('tpolls.create')">
            +Tpoll
        </x-navbar-link>
    </x-navbar>
  </body>
</html>
