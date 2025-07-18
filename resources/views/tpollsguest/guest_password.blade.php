@extends('layout')

@section('inhalt')
<div class="container mt-10 d-flex flex-justify-center">
    <div class="card border bd-owrBlue shadow-1 w-100 mw-400">
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
                <button type="submit" class="button primary w-100 mt-4">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
