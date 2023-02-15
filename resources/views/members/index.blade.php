@extends('layout')

@section('title', 'ÖWR Planungstool LV Wien - Member')

@section('inhalt')

<h4 class="mt-7 mb-0 p-3 bg-owrBlue fg-white bd-owrBlue border-left border-size-4"><span class='mif-books'></span> Members <small class="fg-white">Verwalte die Einsatzkr&auml;fte</small></h4>
<table class="table">
    <thead>
    <tr>
        <th class="sortable-column">ID</th>
        <th class="sortable-column">Vorname</th>
        <th class="sortable-column">Nachname</th>
        <th>Telefonnummer</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($members as $member)
            <tr>
                <td>{{ $member->id }}</td>
                <td>{{ $member->nachname }}</td>
                <td>{{ $member->vorname }}</td>
                <td>{{ $member->telefon }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection

@section('scripts')

<script src="{{ url('js/myscripts.js') }}"></script>
<script src="{{ url('js/cookies.js') }}"></script>

@endsection
