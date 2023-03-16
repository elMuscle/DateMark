@extends('layout')

@section('title', 'ÖWR Planungstool LV Wien - Terminlisten')

@section('inhalt')

{{-- Beschreibung --}}
<h4 class="mt-3 mt-7-md mb-0 p-3 bg-owrBlue fg-white bd-owrBlue border-left border-size-4"><span class='mif-calendar'></span>@if (isset($active_member->name)) {{ $active_member->name }} {{ $active_member->surname }} <small class="fg-white">Events</small>@endif</h4>
{{-- Formularfelder --}}
<div class="mt-4 d-none-print">
    <form method="GET" action="{{ Route('tpollsguest.member') }}" id="NamenAuswahl">
        @csrf
        <select class="w-50-sm mx-auto"  data-role="select" data-prepend="Name:" data-add-empty-value="true" data-filter-placeholder="Nach Namen suchen" data-on-change='document.getElementById("NamenAuswahl").submit()' name="member_id">
            @foreach ($members as $member)
                <option value="{{ $member->id }}"
                    @if (isset($active_member->id) && $member->id == $active_member->id)
                        selected="selected"
                    @endif
                >{{ $member->name }} {{ $member->surname }}</option>
            @endforeach
        </select>
    </form>
</div>
@if (isset($active_member->name))
<div class="mt-5">
<table class="table subcompact striped row-hover text-center table-border cell-border">
    <thead>
        <tr>
            {{-- <th>{{ __('ID') }}</th> --}}
            <th>{{ __('Title') }}</th>
            <th>{{ __('Location') }}</th>
            <th>{{ __('Date') }}</th>
            <th>{{ __('Time') }}</th>
            <th>{{ __('Status') }}</th>
            <th class="d-none-print">{{ __('Cancel') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($events as $event)
            <tr>
                {{-- <td>{{ $event->id }}</td> --}}
                <td>{{ $event->was }}</td>
                <td>{{ $event->ort }}</td>
                <td>{{ $event->datum->format('d.m.Y') }}</td>
                <td>{{ $event->beginn->format('H:i') }} - {{ $event->ende->format('H:i') }}</td>
                @switch($event->pivot->verfuegbarkeit)
                    @case(3)
                        <td style="background-color: rgba(0, 255, 0, 0.1)"><span class="mif-checkmark fg-green"></span></td>
                        @break
                    @case(2)
                        <td style="background-color: rgba(240, 163, 10, 0.1)"><span class="fg-amber text-bold">(<span class="mif-checkmark"></span>)</span></td>
                        @break
                    @case(1)
                        <td></td>
                        @break
                    @case(0)
                        <td style="background-color: rgba(255, 0, 0, 0.1)"><span class="mif-cross fg-red"></td>
                        @break

                    @default
                    <td></td>
                @endswitch
                <td class="d-none-print">
                    <button class="button alert outline" onclick="Metro.dialog.open('#Dialog{{ $event->id }}')">{{ __('sign off') }}</button>
                    <div class="dialog alert" data-role="dialog" id="Dialog{{ $event->id }}" data-close-button="true" data-overlay-click-close="true">
                        <div class="dialog-title">{{ __('Do you really want to sign off?') }}</div>
                        <div class="dialog-content">
                            {{ __('You are about to sign off from') }} <b>{{ $event->was }}</b>!
                        </div>
                        <div class="dialog-actions">
                            <form method="post" action="{{ route('tpollsguest.cancel')}}">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="member_id" value="{{ $active_member->id }}">
                                <input type="hidden" name="event_id" value="{{ $event->id }}">
                                <button type="submit" class="button outline">{{ __('Sign off') }}</button>
                                <button class="button alert js-dialog-close">{{ __('Close') }}</button>
                            </form>
                        </div>
                    </div>
                    </td>

            </tr>
        @endforeach
    </tbody>
</table>
</div>
@endif

@endsection

@section('scripts')

<script src="{{ url('js/myscripts.js') }}"></script>
<script src="{{ url('js/cookies.js') }}"></script>

@endsection
