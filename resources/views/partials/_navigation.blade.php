<div class="d-flex flex-justify-between">
    <ul class="h-menu bg-scheme fg-scheme">
        <li>
            <a class="fg-black text-left va-middle" href="{{ route('home.index') }}">
                <img src="/img/DateMark-logo-small.png" alt="Logo" width="30" height="30" class="">
                DateMark
            </a>
        </li>
        <li><a @if (request()->routeIs('dashboard')) class="text-bold" @endif href="{{ route('dashboard') }}">Dashboard</a></li>
        <li><a @if (request()->routeIs('events.index')) class="text-bold" @endif href="{{ route('events.index') }}">Events</a></li>
        <li><a @if (request()->routeIs('members.index')) class="text-bold" @endif href="{{ route('members.index') }}">Members</a></li>
        <li><a @if (request()->routeIs('tpolls.create')) class="text-bold" @endif href="{{ route('tpolls.create') }}">+Tpoll</a></li>
        <li><a @if (request()->routeIs('events.create')) class="text-bold" @endif href="{{ route('events.create') }}">+Event</a></li>
        <li><a @if (request()->routeIs('members.create')) class="text-bold" @endif href="{{ route('members.create') }}">+Member</a></li>
    </ul>
    <ul class="h-menu">
        <li>
            <a href="#" class="dropdown-toggle">{{ Auth::user()->name }}</a>
            <ul class="d-menu" data-role="dropdown">
                <li><a href="{{ route('profile.edit') }}">{{ __('Profile') }}</a></li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                <li><a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();this.closest('form').submit();"
                    >{{ __('Log Out') }}</a></li>
                </form>
            </ul>
        </li>
    </ul>
</div>
