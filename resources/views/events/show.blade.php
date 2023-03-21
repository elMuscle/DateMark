<x-dashboard-layout>
    <x-slot name="header">
        <h4>
            {{ __('Event') }}
        </h4>
    </x-slot>

    <!-- Print out Tpoll-->
    <div class="container mt-5">
        <div class="p-2 bg-white border border-radius bd-transparent">
            {{-- Print event Information --}}
            <div>
                <h1>{{ $event->was }}</h1>
                <p>{{ $event->ort }}</p>
                <p>{{ $event->datum->format('d.m.Y') }} von {{ $event->beginn->format('H:i') }} bis {{ $event->ende->format('H:i') }}</p>
            </div>
            <h4>{{ __('Members') }}:</h4>
            {{-- Print connected members --}}
            <table  class="table striped"
                    data-role="table"
                    data-show-search="no"
                    data-show-pagination="no"
                    data-show-table-info="no"
                    data-rows="-1"
                    data-show-rows-steps="no"
                    data-cell-wrapper="true"
                    >
                <thead>
                <tr>
                    <th data-sortable="true">{{ __('Surname') }}</th>
                    <th data-sortable="true">{{ __('Name') }}</th>
                    <th data-sortable="true">{{ __('Phone') }}</th>
                    <th data-sortable="true">{{ __('E-Mail') }}</th>
                    <th data-sortable="true" data-sort-dir="desc">{{ __('Status') }}</th>
                    {{-- <th class="d-none-print" data-cls-column="d-none-print">{{ __('Disconnect') }}</th> --}}
                    <th class="d-none-print" data-cls-column="d-none-print">{{ __('Edit') }}</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($event->members as $member)
                        <tr>
                            <td>{{ $member->surname }}</td>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->phone }}</td>
                            <td>{{ $member->mail }}</td>
                            <td><span class="fg-white">{{ $member->pivot->verfuegbarkeit }}</span>
                                @switch($member->pivot->verfuegbarkeit)
                                    @case(3)
                                        <span class="tally success">{{ __('will come') }}</span>
                                        @break
                                    @case(2)
                                        <span class="tally warning">{{ __('maybe') }}</span>
                                        @break
                                    @case(0)
                                        <span class="tally alert">{{ __('will not come') }}</span>
                                        @break

                                    @default

                                @endswitch
                            </td>
                            {{-- <td class="d-print-none"><a href="{{ route('members.edit',['member'=>$member->id]) }}" class="button info outline">{{ __('Disconnect') }}</a></td> --}}
                            <td class="d-print-none"><a href="{{ route('members.edit',['member'=>$member->id]) }}" class="button warning outline">{{ __('Edit') }}</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-dashboard-layout>
