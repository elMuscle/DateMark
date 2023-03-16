<x-app-layout>
    <x-slot name="header">
        <h4>
            {{ __('Tpoll') }}
        </h4>
    </x-slot>

    <!-- Print out Tpoll-->
    <div class="container mt-5">
        <div class="p-2 bg-body rounded">
            {{-- Print Tpoll Information --}}
            <div>
                <a href="{{ route('tpollsguest.show',['tpoll' => $tpoll]) }}"><h1>{{ $tpoll->titel }}</h1></a>
                <p>{{ $tpoll->info }}</p>
                <p>{{ $tpoll->beschreibung }}</p>
            </div>
            <h4>{{ __('Events') }}:</h4>
            {{-- Print connected events --}}
            <table class="table table-striped">
                <thead class="table-primary">
                <tr>
                    {{-- <th scope="col">{{ __('ID') }}</th> --}}
                    <th scope="col">{{ __('Title') }}</th>
                    <th scope="col">{{ __('Location') }}</th>
                    <th scope="col">{{ __('Date') }}</th>
                    <th scope="col">{{ __('Time') }}</th>
                    <th scope="col">{{ __('Coming') }}</th>
                    <th scope="col">{{ __('Edit') }}</th>
                </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($events as $event)
                        <tr>
                            {{-- <td>{{ $event->id }}</td> --}}
                            <td><a href="{{ route('events.show',['event' => $event]) }}">{{ $event->was }}</a></td>
                            <td>{{ $event->ort }}</td>
                            <td>{{ $event->datum->format('d.m.Y') }}</td>
                            <td>{{ $event->beginn->format('H:i') }} - {{ $event->ende->format('H:i') }}</td>
                            <td>{{ $event->members()->where('verfuegbarkeit','=', '3')->count() }}</td>
                            <td><a href="{{ route('events.edit',['event' => $event]) }}" type="button" class="btn btn-outline-warning">{{ __('Edit') }}</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
