<x-dashboard-layout>
    <x-slot name="header">
        <h4>
            {{ __('Dashboard') }}
        </h4>
    </x-slot>

    <!-- Print out Tpolls-->
    <div class="container mt-5">
        <div class="row">
            <!-- Loop through Tpolls-->
            @foreach ($tpolls as $tpoll)
            <div class="cell-sm-6 cell-lg-4 cell-xl-3">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex flex-justify-between">
                            <div><a class="h5 card-title" href="{{ route('tpolls.show',['tpoll'=>$tpoll->id]) }}">
                                {{ $tpoll->titel }}
                            </a></div>
                            <div>
                                @switch($tpoll->status)
                                    @case(2)
                                        <span class="tally success">{{ __('Active') }}</span>
                                        @break
                                    @case(1)
                                        <code class="warning">{{ __('In Progress') }}</code>
                                        @break
                                    @case(0)
                                        <span class="tally alert">{{ __('Archived') }}</span>
                                        @break

                                    @default

                                @endswitch
                            </div>
                        </div>
                    </div>
                    <div class="card-content p-2">
                        @if ($tpoll->events()->where('datum', '>=', $today)->orderBy('datum')->count() != 0)
                        <div class="border-bottom bd-lightGray pb-2">
                            <div class="row flex-align-center">
                                <div class="cell-auto px-1">Besetztung:</div>
                                <div class="cell px-1">
                                    <div class="" data-role='progress' data-value='
                                    @php
                                    $percent = 0;
                                    $missing = 0;
                                    $event_amount = $tpoll->events()->where('datum', '>=', $today)->orderBy('datum')->count();
                                    foreach ($tpoll->events()->where('datum', '>=', $today)->orderBy('datum')->get() as $event) {
                                        $event_percent = $event->members()->where('verfuegbarkeit','=', '3')->count()/$event->need*100;
                                        $percent = $percent + ($event_percent/$event_amount);
                                        if ($event->need - $event->members()->where('verfuegbarkeit','=', '3')->count() > 0) {
                                            $missing = $missing + $event->need - $event->members()->where('verfuegbarkeit','=', '3')->count();
                                        }
                                    }
                                    echo round($percent);
                                    @endphp
                                    ' data-small='true'></div>
                                </div>
                            </div>
                            <span class="px-1">{{ __('Missing:') }} {{ $missing }}</span>
                        </div>
                        @endif
                        <p>{{ $tpoll->info }}</p>
                        <p>Events: <code class="info"> {{ $tpoll->events()->count() }}</code></p>
                    </div>
                    <div class="card-footer">
                        <button class="button @if ($tpoll->status != 1) warning @else default @endif outline" @if ($tpoll->status != 1) onclick="window.location.href = '{{ route('tpolls.edit',['tpoll'=>$tpoll->id]) }}';" @endif>Edit</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-dashboard-layout>
