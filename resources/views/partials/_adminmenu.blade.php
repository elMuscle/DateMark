<div data-role="appbar" data-expand-point="md" class="bg-lightGray">
    <ul class="app-bar-menu">
        <li><a href="{{ route('home.index') }}">Startseite</a></li>
        <li>
            <a href="#" class="dropdown-toggle">Tpolls</a>
            <ul class="d-menu" data-role="dropdown">
                <li><a href="{{ route('tpolls.index') }}">Tpolls verwalten</a></li>
                <li><a href="{{ route('tpolls.create') }}">Tpoll erstellen</a></li>
            </ul>
        </li>
        <li>
            <a href="#" class="dropdown-toggle">Events</a>
            <ul class="d-menu" data-role="dropdown">
                <li><a href="{{ route('tpolls.index') }}">Events verwalten</a></li>
                <li><a href="{{ route('tpolls.create') }}">Event hinzufügen</a></li>
            </ul>
        </li>
        <li>
            <a href="#" class="dropdown-toggle">Member</a>
            <ul class="d-menu" data-role="dropdown">
                <li><a href="{{ route('tpolls.index') }}">Member verwalten</a></li>
                <li><a href="{{ route('tpolls.create') }}">Member hinzufügen</a></li>
            </ul>
        </li>
        <li><a href="#">Log Out</a></li>
    </ul>
</div>
<div class="pt-12"></div>
