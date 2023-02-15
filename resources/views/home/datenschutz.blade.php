@extends('layout')

@section('title', 'ÖWR - Datenschutz')

@section('menu')
<ul data-role="tabs" data-expand="true" data-cls-tabs="flex-justify-center mt-2">
  <li><a href="#" onclick="history.back()"><span class="mif-arrow-left"></span>Zurück</a></li>
</ul>
@endsection

@section('inhalt')

<h4 class="mt-7 mb-0 p-3 bg-green fg-white bd-green border-left border-size-4">DATENSCHUTZ</h4>
<div class="p-3 pt-7 bg-grayWhite bd-green border-left border-size-4">
    <p>Liebe Einsatzkraft!</p>
    <p>Diese Anwendung dient nur zur ÖWR-Wien internen Einsatzplanung. Es besteht keine Verbindung zu anderen Datenanwendungen, eine Nutzung der personenbezogenen Daten für andere Zwecke als der Einsatzplanung ist ausgeschlossen.</p>
    <p>Durch Eingabe meines Namens und Telefonnummer stimme ich zu, dass Einsatzleitung und andere Einsatzkräfte mich zum Zwecke der Einsatzkoordination kontaktieren dürfen. Eine andere Verwendung der Daten ist ausgeschlossen.</p>
    <p>
    Danke für Deine Einsatzbereitschaft.<br />
    Liebe Grüße<br />
    die ÖWR-Wien<br />
    </p>
</div>

@endsection

@section('scripts')

<script src="js/myscripts.js"></script>
<script src="js/cookies.js"></script>

@endsection