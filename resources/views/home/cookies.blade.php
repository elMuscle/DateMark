@extends('layout')

@section('title', 'ÖWR - Cookies')

@section('menu')
<ul data-role="tabs" data-expand="true" data-cls-tabs="flex-justify-center mt-2">
  <li><a href="#" onclick="history.back()"><span class="mif-arrow-left"></span>Zurück</a></li>
</ul>
@endsection

@section('inhalt')

<h4 class="mt-7 mb-0 p-3 bg-amber fg-white bd-amber border-left border-size-4">Cookies ... ein heikles Thema!</h4>
<div class="p-3 pt-7 bg-grayWhite bd-amber border-left border-size-4">
  <p>Liebe Einsatzkraft!</p>
  <p>Wir nutzen auf dieser Webseite Cookies, um das Eintragen der Termine zu erleichtern.</p>
  <p>Da wir aber gleichzeitig vollstens transparent sein möchten, kannst du dir weiter unten ansehen, was wir aktuell gespeichert haben.</p>
  <p>
    Danke für Deine Einsatzbereitschaft.<br />
    Liebe Grüße<br />
    Lukas<br />
    DateMark-Ersteller
  </p>
</div>
<div class="p-3 mt-5 bg-grayWhite bd-amber border-left border-size-4" id="cookieShow">
    <p>Folgendes ist in den Cookies gespeichert:</p>
</div>
<div class="p-3 mt-5 bg-grayWhite bd-amber border-left border-size-4">
    <p>Du möchtest alle gespeicherten Cookies löschen?</p>
    <p>Hier kannst du dies tun:</p>
    <button class="image-button alert" style="width:230px;" onclick="deleteAllCookies()">
        <span class="mif-bin icon"></span>
        <span class="caption">Alle Cookies löschen!</span>
    </button>
</div>

@endsection

@section('scripts')

<script src="js/myscripts.js"></script>
<script src="js/cookies.js"></script>
<script>
    cookieShowFkt();
</script>

@endsection