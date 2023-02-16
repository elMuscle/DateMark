@extends('layout')

@section('title', 'ÖWR Planungstool LV Wien - Terminlisten')

@section('inhalt')

<h4 class="mt-7 mb-0 p-3 bg-owrBlue fg-white bd-owrBlue border-left border-size-4"><span class='mif-books'></span> Willkommen! <small class="fg-white">Hier findest du alle offenen Terminlisten</small></h4>
<div class="">
    @if (count($tpolls_active)>0)
        <ul class="border border-top-none p-3" data-role="listview" data-view="table" data-select-node="false" data-role="ripple" data-ripple-target="li" data-structure='{"info": true, "status": true, "events": true, "edit": true, "delete": true}'>

            <li data-icon="<span class='mif-clipboard fg-owrRed'>"
                data-caption="Titel"
                id="$count"
                data-content="Kurztitel<!-- <div class='mt-1 w-50-sm w-25-xl' data-role='progress' data-value='0' data-small='true'>-->"
                data-info="Kurztitel"
                data-status="Status"
                data-events="Anzahl Termine"
                data-edit="Bearbeiten"
                data-delete="Löschen"
            ></li>
<hr>
            @foreach ($tpolls as $tpoll)
                <li data-icon="<span class='mif-clipboard fg-owrRed'>"
                    data-caption="{{ $tpoll->titel }}"
                    onclick="window.location.href = '{{ route('tpolls.show',['tpoll'=>$tpoll->id]) }}';"
                    id="$count"
                    data-content="{{ $tpoll->info }}<!-- <div class='mt-1 w-50-sm w-25-xl' data-role='progress' data-value='0' data-small='true'>-->"
                    data-info="{{ $tpoll->info }}"
                    data-status="{{ $tpoll->status }}"
                    data-events="{{ $tpoll->events()->count() }}"
                    data-edit="<a href='{{ route('tpolls.edit',['tpoll'=>$tpoll->id]) }}'><span class='mif-pencil fg-blue mif-lg'></span></a>"
                    data-delete="<a href=''><span class='mif-bin fg-red mif-lg'></span></a>"
                ></li>
            @endforeach
        </ul>
    @else
        <div class="border border-top-none p-5 bg-light">
            <span class="remark alert"> Keine Terminliste vorhanden --> Entspannung ;)</span>
        </div>
    @endif

</div>

@endsection

@section('scripts')

<script src="{{ url('js/myscripts.js') }}"></script>
<script src="{{ url('js/cookies.js') }}"></script>

@endsection
