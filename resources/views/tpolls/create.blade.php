@extends('layout')

@section('title', 'ÖWR Planungstool LV Wien - Terminlisten')

@section('inhalt')

<h4 class="mt-7 mb-0 p-3 bg-owrBlue fg-white bd-owrBlue border-left border-size-4"><span class='mif-clipboard'></span> Tpoll erstellen</h4>
<div class="p-5 border">
<form method="post" action="{{ route('tpolls.store') }}">
    @csrf
    <div class="row mb-2">
        <label for="tpoll_name" class="cell-sm-2">Titel</label>
        <div class="cell-sm-10">
            <input type="text" id="tpoll_name" name="tpoll_name" class="metro-input" value="{{ old('tpoll_name') }}">
            @error('tpoll_name')
                <small class="fg-red">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <label for="tpoll_info" class="cell-sm-2">Kurztitel</label>
        <div class="cell-sm-10">
            <input type="text" id="tpoll_info" name="tpoll_info" class="metro-input" value="{{ old('tpoll_info') }}">
            @error('tpoll_info')
                <small class="fg-red">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <label for="tpoll_desc" class="cell-sm-2">Beschreibung</label>
        <div class="cell-sm-10">
            <textarea id="tpoll_desc" value="{{ old('tpoll_desc') }}" name="tpoll_desc" data-role="textarea" data-auto-size="true" data-max-height="200" class="metro-input"></textarea>
            @error('tpoll_desc')
                <small class="fg-red">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <label for="tpoll_termine" class="cell-sm-2">Termine</label>
        <div class="cell-sm-10">
            <input  id="tpoll_termine" name="tpoll_termine" type="text" data-role="taginput" value="{{ old('tpoll_termine') }}">
            @error('tpoll_termine')
                <small class="fg-red">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="row mb-2">
        <label for="tpoll_status" class="cell-sm-2">Status</label>
        <div class="cell-sm-10">
            <input name="tpoll_status" value="2" type="radio"
                data-role="radio" data-caption="Freigegeben">
            <input name="tpoll_status" value="1" type="radio"
                data-role="radio" data-caption="In Bearbeitung" checked>
        </div>
        @error('tpoll_status')
                <small class="fg-red">{{ $message }}</small>
            @enderror
    </div>
    <div class="row">
        <div class="cell">
            <button type="submit" class="button success">Tpoll erstellen</button>
        </div>
    </div>
</form>
</div>
@endsection

@section('scripts')

<script src="js/myscripts.js"></script>
<script src="js/cookies.js"></script>

@endsection