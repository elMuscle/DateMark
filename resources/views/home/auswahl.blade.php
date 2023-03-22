@extends('layout')

@section('title', 'Datemark - Home')

@section('inhalt')
<div class="container">
<h4 class="mt-7 mb-0 p-3 bg-owrBlue fg-white bd-owrBlue border-left border-size-4"><span class='mif-books'></span> {{ __('layout.welcome') }} <small class="fg-white">{{ __('layout.lists') }}</small></h4>
<div class="">
    @if ((count($tpolls_active)+count($tpolls_edit))>0)
        <ul class="border border-top-none p-3" data-role="listview" data-view="content" data-select-node="false" data-role="ripple" data-ripple-target="li">
            @foreach ($tpolls_active as $tpoll)
                <li data-icon="<span class='mif-clipboard fg-owrRed'>"
                    data-caption="{{ $tpoll->titel }}"
                    onclick="window.location.href = '{{ route('tpollsguest.show',['tpoll'=>$tpoll->id]) }}';"
                    id="$count"
                    data-content="

                    <div class='mt-1 w-50-sm w-25-xl' data-role='progress' data-value='
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
                    "
                ></li>
            @endforeach
            @foreach ($tpolls_edit as $tpoll)
                <li data-icon="<span class='mif-clipboard fg-owrRed'>"
                    data-caption="{{ $tpoll->titel }}"
                    id="$count"
                    data-content="{{ __('layout.reconstruction') }}"
                ></li>
            @endforeach
        </ul>
    @else
        <div class="border border-top-none p-5 bg-light">
            <span class="remark alert">{{ __('layout.notpolls') }}</span>
        </div>
    @endif
</div>
<div class="border border-top-none p-3 d-flex flex-justify-center">
    <button class="image-button success" onclick="window.location.href = '{{ route('tpollsguest.member') }}';">
        <span class="mif-calendar icon"></span>
        <span class="caption">Meine Einsätze</span>
    </button>
</div>
<div class="p-3 bg-grayWhite bd-owrBlue border-top border-size-5">
    <p>Danke für Deine Einsatzbereitschaft!</p>
</div>
<div class="p-3 mt-3 bg-grayWhite">
    <p>--> {{ __('layout.improve') }} <a href="mailto:datemark@lukaskubica.de">{{ __('layout.suggestions') }}</a></p>
</div>
@include('partials._footer')
</div>

@endsection

@section('scripts')

<script src="{{ url('js/myscripts.js') }}"></script>
<script src="{{ url('js/cookies.js') }}"></script>

@endsection
