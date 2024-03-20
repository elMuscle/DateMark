@extends('layout')

@section('title', 'Planungstool LV Wien - Terminlisten')

@section('inhalt')

{{-- Beschreibung --}}
<h4 class="mt-3 mt-7-md mb-0 p-3 bg-owrBlue fg-white bd-owrBlue border-left border-size-4"><span class='mif-clipboard'></span> {{ $tpoll->titel }}</h4>
<div class="p-3 pt-7 bg-grayWhite bd-owrBlue border-left border-size-4 d-none-print">
<?php
if(isset($nameincookie)){
    $vorname = explode(" ",$nameincookie);
    echo "Liebe:r $vorname[0],<br /><br />";
} else {
    echo "Liebe Einsatzkraft!<br /><br />";
}
?>
{{ $tpoll->beschreibung }}
</div>

{{-- Legende für Tabellen --}}
<div class="px-2 py-2 gap d-none-print">
    <span class="fg-green d-inline mr-3"><span class="mif-checkmark"></span> : Bin dabei!</span>
    <span class="fg-amber d-inline mr-3">(<span class="mif-checkmark"></span> ) : Vielleicht!</span>
    <span class="fg-red d-inline">(<span class="mif-cross"></span> ) : Ich kann nicht!</span>
</div>

{{-- Tabelle --}}
<div style="overflow-x:auto;">
    <form method="post" id="MemberEntry" action="{{ route('tpollsguest.update') }}">
        @csrf
        @method('put')
        {{-- General Inputs --}}
        @if (isset($active_member->name))
        <input type="hidden" name="tpoll_id" value="{{ $tpoll->id }}">
        <input type="hidden" name="member_id" value="{{ $active_member->id }}">
        <input type="hidden" name="events" value="@php
            foreach ($events as $event) {
                echo $event->id.',';
            }
        @endphp ">
        @endif
    <table class="table subcompact striped row-hover text-center table-border cell-border">
        <thead>
        <tr>
            <th>Datum</th>

            @foreach ($events as $event)
                <th>
                    @php
                        echo $tage[$event->datum->format('w')];
                        echo ', ';
                        echo $event->datum->format('d.m.Y');
                    @endphp
                </th>
            @endforeach
        </tr>
        <tr>
            <th><span class='text-bold'>Was</span></th>
            @foreach ($events as $event)
                <th>
                    <span class='text-bold'>{{ $event->was }}</span>
                </th>
            @endforeach
        </tr>
        <tr>
            <th><span class='text-bold'>Wo</span></th>
            @foreach ($events as $event)
                <th>
                    <span class='text-bold'>{{ $event->ort }}</span>
                </th>
            @endforeach
        </tr>
        <tr>
            <th><span class='text-bold'>Zeit</span></th>
            @foreach ($events as $event)
                <th>
                    <span class='text-bold'>{{ $event->beginn->format('H:i') }} - {{ $event->ende->format('H:i') }}</span>
                </th>
            @endforeach
        </tr>
        </thead>
        <tbody>
            @forelse ($usedmembers as $member)
                <tr>
                    <td class="sticky op-white">{{ str(Str::substr($member->surname, 0, 3))->append('.') }} {{ $member->name }} </td>
                    @foreach ($events as $event)
                        @if ($member->events->contains($event->id))

                            @switch($member->events->firstWhere('id',$event->id)->pivot->verfuegbarkeit)
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

                        @else
                            <td></td>
                        @endif
                    @endforeach
                </tr>
            @empty
                <tr>
                    <td>Keine Einträge.....</td>
                </tr>
            @endforelse
        </tbody>
        <tfoot class="d-none-print">
            <tr>
                <td>Datum</td>

                @foreach ($events as $event)
                    <td>
                        @php
                            echo $tage[$event->datum->format('w')];
                            echo ', ';
                            echo $event->datum->format('d.m.Y');
                        @endphp
                    </td>
                @endforeach
            </tr>
            <tr>
                <td><span class='text-bold'>Was</span></td>
                @foreach ($events as $event)
                    <td>
                        <span class='text-bold'>{{ $event->was }}</span>
                    </td>
                @endforeach
            </tr>
            <tr>
                <td><span class='text-bold'>Wo</span></td>
                @foreach ($events as $event)
                    <td>
                        <span class='text-bold'>{{ $event->ort }}</span>
                    </td>
                @endforeach
            </tr>
            <tr>
                <td><span class='text-bold'>Zeit</span></td>
                @foreach ($events as $event)
                    <td>
                        <span class='text-bold'>{{ $event->beginn->format('H:i') }} - {{ $event->ende->format('H:i') }}</span>
                    </td>
                @endforeach
            </tr>

            @if (isset($active_member->name))
            <tr class="">
                <td class="namensplatz">@if (isset($active_member->name))
                    {{ $active_member->name }} {{ str(Str::substr($active_member->surname, 0, 3))->append('.') }}
                @else
                    No Member selected
                @endif</td>
            {{-- Event Inputs --}}
                @php
                    $counter = 0;
                @endphp
                @foreach ($events as $event)
                    <td>
                        <div class="d-flex flex-column">
                            <div class="p-2 text-center"><input type="radio" value="3" data-role="radio" data-style="2" data-cls-check="bd-green myCheckJa" name="{{ $event->id }}" @if ($active_member_status[$counter] == 3) checked @endif></div>
                            <div class="p-2 text-center"><input type="radio" value="2" data-role="radio" data-style="2" data-cls-check="bd-amber myCheckVielleicht" name="{{ $event->id }}" @if ($active_member_status[$counter] == 2) checked @endif></div>
                            <div class="p-2 text-center"><input type="radio" value="1" data-role="radio" data-style="2" data-cls-check="bd-gray myCheckNix" name="{{ $event->id }}" @if ($active_member_status[$counter] == 1) checked @endif></div>
                            <div class="p-2 text-center"><input type="radio" value="0" data-role="radio" data-style="2" data-cls-check="bd-red myCheckNein" name="{{ $event->id }}" @if ($active_member_status[$counter] == 0) checked @endif></div>
                        </div>
                    </td>
                @php
                    $counter++;
                @endphp
                @endforeach
            </tr>
            @endif
        </tfoot>
    </table>
    </form>
</div>
{{-- Formularfelder --}}
<div class="mt-4 d-none-print">
    <form method="GET" action="{{ Route('tpollsguest.show',$tpoll->id) }}" id="NamenAuswahl">
        @csrf
        <select class="w-50-sm mx-auto"  data-role="select" data-prepend="Name:" data-add-empty-value="true" data-filter-placeholder="Nach Namen suchen" data-on-change='document.getElementById("NamenAuswahl").submit()' name="member_id">
            @foreach ($active_members as $member)
                <option value="{{ $member->id }}"
                    @if (isset($active_member->id) && $member->id == $active_member->id)
                        selected="selected"
                    @endif
                >{{ $member->name }} {{ str(Str::substr($member->surname, 0, 3))->append('.') }}</option>
            @endforeach
        </select>
    </form>
    @if (isset($active_member->name))
    <div class="d-flex flex-justify-center mt-4">
        <button class="image-button success w-50 w-25-sm" data-role="ripple" type='submit' value='Submit' onclick="document.getElementById('MemberEntry').submit()">
            <span class="mif-floppy-disk icon"></span>
            <span class="caption text-center">Speichern</span>
        </button>
    </div>
    @endif
</div>
@include('partials._footer')
@endsection

@section('scripts')

<script src="{{ url('js/myscripts.js') }}"></script>
<script src="{{ url('js/cookies.js') }}"></script>

@endsection
