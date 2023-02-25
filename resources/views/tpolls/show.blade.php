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
                <h1>{{ $tpoll->titel }}</h1>
                <p>{{ $tpoll->info }}</p>
                <p>{{ $tpoll->beschreibung }}</p>
            </div>
            <h4>{{ __('Events') }}:</h4>
            {{-- Print connected events --}}
            <table class="table table-striped">
                <thead class="table-primary">
                <tr>
                    <th scope="col">{{ __('ID') }}</th>
                    <th scope="col">{{ __('Title') }}</th>
                    <th scope="col">{{ __('Date') }}</th>
                    <th scope="col">{{ __('Time') }}</th>
                    <th scope="col">{{ __('Unlink') }}</th>
                    <th scope="col">{{ __('Edit') }}</th>
                </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($events as $event)
                        <tr>
                            <td>{{ $event->id }}</td>
                            <td>{{ $event->was }}</td>
                            <td>{{ $event->ort }}</td>
                            <td>{{ $event->beginn->format('H:i') }} - {{ $event->ende->format('H:i') }}</td>
                            <td><a href="" type="button" class="btn btn-outline-info">{{ __('Unlink') }}</a></td>
                            <td><a href="" type="button" class="btn btn-outline-warning">{{ __('Edit') }}</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
