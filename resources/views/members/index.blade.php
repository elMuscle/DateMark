<x-dashboard-layout>
    <x-slot name="header">
        <h4>
            {{ __('Members') }}
        </h4>
    </x-slot>

    <!-- Print out Tpoll-->
    <div class="container mt-5">
        <div class="p-2 bg-white border border-radius bd-transparent">
            {{-- Print members --}}
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
                    @foreach ($members as $member)
                        <tr>
                            <td>{{ $member->surname }}</td>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->phone }}</td>
                            <td>{{ $member->mail }}</td>
                            <td>
                                @if ($member->status == 1)
                                <span class="tally success">{{ __('active') }}</span>
                                @else
                                <span class="tally alert">{{ __('not active') }}</span>
                                @endif
                            </td>
                            {{-- <td class="d-print-none"><a href="{{ route('members.edit',['member'=>$member->id]) }}" class="button info outline">{{ __('Disconnect') }}</a></td> --}}
                            <td><a href="{{ route('members.edit',['member'=>$member->id]) }}" class="button warning outline">{{ __('Edit') }}</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-dashboard-layout>
