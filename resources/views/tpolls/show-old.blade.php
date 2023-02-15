@extends('layout')

@section('title', 'ÖWR Planungstool LV Wien - Terminlisten')

@section('inhalt')

<h4 class="mt-3 mt-7-md mb-0 p-3 bg-owrBlue fg-white bd-owrBlue border-left border-size-4"><span class='mif-clipboard'></span> {{ $tpoll->titel }}</h4>
<div class="p-3 pt-7 bg-grayWhite bd-owrBlue border-left border-size-4">
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

<!-- Legende für Tabelle -->
<div class="row">
    <div class="cell-5 cell-sm-3 cell-md-2 cell-xxl-1">
        <span class="fg-green place-left-sm"><span class="mif-checkmark"></span> : Bin dabei!</span>
    </div>
    <div class="cell-5 cell-sm-3 cell-lg-2">
        <span class="fg-amber place-left-sm">(<span class="mif-checkmark"></span> ) : Vielleicht!</span>
    </div>
    <div class="cell-3 d-none d-inline-lg cell-xl-2 offset-3 offset-md-5 offset-lg-5 offset-xl-6 offset-xxl-7">
        <button class="button knopf place-right" id="tableresizer" onclick="tablesize();buttonaenderung();"><span class="mif-unfold-more rotate-90"></span>Tabelle vergrößern</button>
    </div>
</div>

<form>
    <div class="container" id="TabellenContainer">
    <div>
        <div class="mt-0">
        <table class="table striped row-hover cell-border"
                    data-cls-table-container=""
                    data-cls-head="Termine"
                    data-cls-body-cell="py-0"
                    data-cell-wrapper="true"
                    data-role="table"
                    data-show-search="false"
                    data-show-rows-steps="false"
                    data-show-table-info="false"
                    data-show-pagination="false"
                    data-horizontal-scroll="true"
                    data-rows="-1">
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
        </thead>
        <tbody>
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
            @forelse ($usedmembers as $member)
                <tr>
                    <td>{{ $member->vorname }}</td>
                    @foreach ($events as $event)
                        @if ($member->events->contains($event->id))
                            <td class="alert">
                                @switch($member->events->firstWhere('id',$event->id)->pivot->verfuegbarkeit)
                                    @case(3)
                                        <span class="mif-checkmark fg-green"></span>
                                        @break
                                    @case(2)
                                        <span class="fg-amber text-bold">(<span class="mif-checkmark"></span>)</span>
                                        @break
                                    @case(1)

                                        @break

                                    @default

                                @endswitch
                            </td>
                        @else
                            <td>nein</td>
                        @endif
                    @endforeach
                </tr>
            @empty
                <tr>
                    <td>Keine Einträge.....</td>
                </tr>
            @endforelse






            <tr>
                <td><span class='text-bold'>Datum</span></td>
                @foreach ($events as $event)
                    <td>
                        <span class='text-bold'>
                            <?php
                                echo $tage[$event->datum->format('w')];
                                echo ', ';
                                echo $event->datum->format('d.m.Y');
                            ?>
                        </span>
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
        </tbody>
        <tfoot>
        </tfoot>
        </table>

        </div>
    </div>
    </div>
    <div class="container">
        <input class="cell-sm-6 cell-lg-4" id="eingabename" onkeyup="nameact()" onclick="scrollen()" onblur="scrollen()" type="text" data-role="input" data-prepend="Name: " placeholder="Bitte Namen eingeben" data-autocomplete="" onchange='nameact();if($("#eingabename").val().length !=0){setCookie("name",$("#eingabename").val())}'>
    </div>
    <div class="container">
        <div class="mt-2 row">
            <div class="cell-8 cell-sm-4 cell-md-3 cell-xl-2">
                <button class="image-button success w-100" data-role="ripple" type='submit' value='Submit'>
                    <span class="mif-floppy-disk icon"></span>
                    <span class="caption"><?php if(isset($isdrin) && $isdrin){echo "Eintrag Aktualisieren";} else {echo "Speichern";}?></span>
                </button>
            </div>
        </div>
        <div class="d-none" style="height:400px" id="scroller"></div>
    </div>
</form>
<div style="overflow-x:auto;">
<table class="table subcompact striped row-hover text-center">
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
                <td>{{ $member->vorname }}</td>
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
</table>
</div>

@endsection

@section('scripts')

<script src="{{ url('js/myscripts.js') }}"></script>
<script src="{{ url('js/cookies.js') }}"></script>

@endsection
