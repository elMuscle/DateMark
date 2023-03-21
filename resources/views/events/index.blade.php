<x-dashboard-layout>
    <x-slot name="header">
        <h4>
            {{ __('Events') }}
        </h4>
    </x-slot>

    <!-- Print out Tpoll-->
    <div class="container mt-5">
        <div class="p-2 bg-white border border-radius bd-transparent">
            {{-- Print events --}}
            <table  class="table striped"
                    data-role="table"
                    data-show-search="true"
                    data-show-pagination="true"
                    data-show-table-info="true"
                    data-rows="10"
                    data-show-rows-steps="true"
                    data-cell-wrapper="true"
                    >
                <thead>
                <tr>
                    {{-- <th scope="col">{{ __('ID') }}</th> --}}
                    <th data-sortable="true" data-format="date" data-sort-dir="asc" data-format-mask="%d.%m.%Y">{{ __('Date') }}</th>
                    <th data-sortable="true" >{{ __('Title') }}</th>
                    <th data-sortable="true">{{ __('Location') }}</th>
                    <th>{{ __('Time') }}</th>
                    <th>{{ __('Coming') }}</th>
                    <th class="d-none-print" data-cls-column="d-none-print" >{{ __('Coming %') }}</th>
                    <th class="d-none-print" data-cls-column="d-none-print" >{{ __('Edit') }}</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                        <tr>
                            {{-- <td>{{ $event->id }}</td> --}}
                            <td>{{ $event->datum->format('d.m.Y') }}</td>
                            <td><a href="{{ route('events.show',['event' => $event]) }}">{{ $event->was }}</a></td>
                            <td>{{ $event->ort }}</td>
                            <td>{{ $event->beginn->format('H:i') }} - {{ $event->ende->format('H:i') }}</td>
                            <td>{{ $event->members()->where('verfuegbarkeit','=', '3')->count() }} von {{ $event->need }}</td>
                            <td><div data-role='progress' data-value='{{ $event->members()->where('verfuegbarkeit','=', '3')->count()/$event->need*100 }}' data-small='true'></td>
                            <td><a href="{{ route('events.edit',['event' => $event]) }}" type="button" class="button warning outline">{{ __('Edit') }}</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-dashboard-layout>
