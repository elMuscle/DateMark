<x-app-layout>
    <x-slot name="header">
        <h4>
            {{ __('Event') }}
        </h4>
    </x-slot>

    <!-- Print out event-->
    <div class="container mt-5">
        <div class="p-2 bg-body rounded">
            {{-- Print event Information --}}
            <div>
                <h1>{{ $event->was }}</h1>
                <p>{{ $event->ort }}</p>
                <p>{{ $event->datum->format('d.m.Y') }} von {{ $event->beginn->format('H:i') }} bis {{ $event->ende->format('H:i') }}</p>
            </div>
            <h4>{{ __('Signed Members') }}:</h4>
            {{-- Print connected members --}}
            <table class="table table-striped">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">{{ __('ID') }}</th>
                        <th scope="col">{{ __('Surname') }}</th>
                        <th scope="col">{{ __('Name') }}</th>
                        <th scope="col">{{ __('Phone') }}</th>
                        <th scope="col">{{ __('Status') }}</th>
                        <th scope="col" class="d-print-none">{{ __('Member Status') }}</th>
                        <th scope="col" class="d-print-none">{{ __('Disconnect') }}</th>
                        <th scope="col" class="d-print-none">{{ __('Edit') }}</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($event->members as $member)
                        <tr>
                            <td>{{ $member->id }}</td>
                            <td>{{ $member->surname }}</td>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->phone }}</td>
                            <td>
                                @switch($member->pivot->verfuegbarkeit)
                                    @case(3)
                                        <span class="badge text-bg-success">{{ __('will come') }}</span>
                                        @break
                                    @case(2)
                                        <span class="badge text-bg-warning">{{ __('maybe') }}</span>
                                        @break
                                    @case(0)
                                        <span class="badge text-bg-danger">{{ __('will not come') }}</span>
                                        @break

                                    @default

                                @endswitch
                            </td>
                            <td class="d-print-none">
                                @if ($member->status == 1)
                                    <span class="badge text-bg-success">{{ __('active') }}</span>
                                @else
                                    <span class="badge text-bg-danger">{{ __('not active') }}</span>
                                @endif
                            </td>
                            <td class="d-print-none"><a href="{{ route('members.edit',['member'=>$member->id]) }}" type="button" class="btn btn-outline-info">{{ __('Disconnect') }}</a></td>
                            <td class="d-print-none"><a href="{{ route('members.edit',['member'=>$member->id]) }}" type="button" class="btn btn-outline-warning">{{ __('Edit') }}</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
