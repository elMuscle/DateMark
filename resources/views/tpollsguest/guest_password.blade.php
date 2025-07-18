@extends('layout')

@section('inhalt')
<div class="mt-10 d-flex flex-justify-center">
    <div class="container-sm w-100 mx-10">
        <ul data-role="tabs" data-expand="true" data-cls-tabs="flex-justify-end mt-2">
            <li><a href="#" onclick="history.back()"><span class="mif-arrow-left"></span>Zurück</a></li>
        </ul>
    </div>
</div>

<div class=" d-flex flex-justify-center">
    <div class="container-sm card border bd-owrBlue shadow-1 w-100 mx-10">
        <div class="card-header bg-owrBlue fg-white text-center">
            <h3 class="m-0">{{ __('Guest Access') }}</h3>
        </div>
        <div class="card-content p-4">
            <form method="POST" action="{{ route('guest.password.verify') }}">
                @csrf
                <input type="hidden" name="redirect" value="{{ $redirect }}">
                <div class="form-group">
                    <label for="password" class="form-label">{{ __('Enter Access Password') }}</label>
                    <input type="password" class="input @error('password') alert-outline @enderror" id="password" name="password" required autofocus>
                    @error('password')
                        <span class="text-alert">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="button primary w-100 mt-4">Weiter</button>
            </form>
        </div>
    </div>
</div>
@include('partials._footer-sticky')
@endsection
