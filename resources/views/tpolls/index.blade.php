<x-app-layout>
    <x-slot name="header">
        <h4>
            {{ __('Dashboard') }}
        </h4>
    </x-slot>

    <!-- Print out Tpolls-->
    <div class="container mt-5">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
            <!-- Loop through Tpolls-->
            @foreach ($tpolls as $tpoll)
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="row justify-content-between">
                        <a class="h5 card-title" href="{{ route('tpolls.show',['tpoll'=>$tpoll->id]) }}">{{ $tpoll->titel }}</a>
                    </div>
                    <p class="card-text">
                        <p>{{ $tpoll->info }}</p>
                        <p>Status: {{ $tpoll->status }}<span class="badge text-bg-success">active</span></p>
                        <p>Events: {{ $tpoll->events()->count() }}</p>
                        <button type="button" class="btn btn-outline-warning" onclick="window.location.href = '{{ route('tpolls.edit',['tpoll'=>$tpoll->id]) }}';">Edit</button>
                        <button type="button" class="btn btn-outline-danger">Delete</button>
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
