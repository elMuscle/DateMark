<div class="container">
    <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('home.index') }}">
        <img src="/img/DateMark-logo-small.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
        DateMark
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <x-navbar-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
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
            <x-navbar-link :href="route('events.create')" :active="request()->routeIs('events.create')">
                +Event
            </x-navbar-link>
            <x-navbar-link :href="route('members.create')" :active="request()->routeIs('members.create')">
                +Member
            </x-navbar-link>
        </ul>
        <div class="d-flex">
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a></li>
                  <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();this.closest('form').submit();"
                        >{{ __('Log Out') }}</a></li>
                </form>
                </ul>
            </div>
        </div>
      </div>

    </div>
  </nav>
</div>
