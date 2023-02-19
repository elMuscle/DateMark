<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

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
            </div>
        </div>
    </div>

</x-app-layout>
