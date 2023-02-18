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
            <x-navbar-link :href="route('members.index')" :active="request()->routeIs('members.index')">
                Members
            </x-navbar-link>
            <x-navbar-link :href="route('events.index')" :active="request()->routeIs('events.index')">
                Events
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
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Tpoll 1</h5>
                <p class="card-text">
                    <p>Status: <span class="badge text-bg-success">active</span></p>
                    <p>Tpoll info</p>
                </p>
                <div class="btn-group">
                    <a href="#" class="btn btn-success active">Active</a>
                    <a href="#" class="btn btn-warning">Under Revision</a>
                    <a href="#" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>
