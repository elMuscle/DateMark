<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap w/ Vite</title>
    @vite(['resources/css/bootstrap.css', 'resources/css/main.css', 'resources/js/app.js', 'resources/js/bootstrap.bundle.js'])
  </head>
  <body data-bs-theme="light" class="container-fluid bg-secondary-subtle px-0">
    <div class="container-fluid bg-body py-1">
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

    </div>
    <div class="container-fluid bg-body border-top border-bottom border-secondary-subtle">
        <div class="container px-4 py-3">
            <h4>Dashboard</h4>
        </div>
    </div>
    <div class="container mt-5">
        <div class="p-3 border border-secondary-subtle rounded-2 bg-body">
            <h5>Tpoll 1 <span class="badge text-bg-success">Aktiv</span></h5>

        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
  </body>
</html>
