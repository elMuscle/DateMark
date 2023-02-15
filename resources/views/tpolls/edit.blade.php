@extends('layout')

@section('title', 'ÖWR Planungstool LV Wien - Terminlisten')

@section('inhalt')

<h4 class="mt-7 mb-0 p-3 bg-owrBlue fg-white bd-owrBlue border-left border-size-4"><span class='mif-clipboard'></span> Tpoll bearbeiten</h4>
<div class="p-5 border">
<form method="post" action="{{ route('tpolls.update', ['tpoll' => $tpoll->id]) }}">
    @csrf
    @method('PUT')
    <div class="row mb-2">
        <label for="titel" class="cell-sm-2">Titel</label>
        <div class="cell-sm-10">
            <input type="text" id="titel" name="titel" class="metro-input" value="{{ $tpoll->titel }}">
            @error('titel')
                <small class="fg-red">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <label for="info" class="cell-sm-2">Kurztitel</label>
        <div class="cell-sm-10">
            <input type="text" id="info" name="info" class="metro-input"
                   value="{{ $tpoll->info }}">
            @error('info')
                <small class="fg-red">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <label for="beschreibung" class="cell-sm-2">Beschreibung</label>
        <div class="cell-sm-10">
            <textarea id="beschreibung" name="beschreibung" data-role="textarea" data-auto-size="true"
                      data-max-height="200" class="metro-input">{{ $tpoll->beschreibung }}</textarea>
            @error('beschreibung')
                <small class="fg-red">{{ $message }}</small>
            @enderror
        </div>
    </div>

    <div class="row mb-2">
        <label for="status" class="cell-sm-2">Status</label>
        <div class="cell-sm-10">
            <input name="status" value="2" type="radio"
                data-role="radio" data-caption="Freigegeben" @if ($tpoll->status == 2) checked @endif>
            <input name="status" value="1" type="radio"
                data-role="radio" data-caption="In Bearbeitung" @if ($tpoll->status == 1) checked @endif>
            <input name="status" value="0" type="radio"
                data-role="radio" data-caption="Archiviert" @if ($tpoll->status == 0) checked @endif>
        </div>
        @error('status')
                <small class="fg-red">{{ $message }}</small>
            @enderror
    </div>
    <div class="row">
        <div class="cell">
            <button type="submit" class="button success">Änderungen speichern</button>
        </div>
    </div>
</form>
</div>
@endsection

@section('scripts')

<script src="js/myscripts.js"></script>
<script src="js/cookies.js"></script>

@endsection
