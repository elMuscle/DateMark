<x-app-layout>
    <x-slot name="header">
        <h4>
            {{ __('Edit Tpoll') }}
        </h4>
    </x-slot>

    <!-- Tpoll Form-->
    <div class="container mt-5 p-3 bg-body rounded">
        <form method="post" action="{{ route('tpolls.update', ['tpoll' => $tpoll->id]) }}">
            @csrf
            @method('PUT')
            {{-- Input Title --}}
            <div class="mb-3">
                <label for="titel" class="form-label">{{ __('Title') }}</label>
                <div class="input-group has-validation">
                    <input type="text" class="form-control" id="titel" name="titel" value="{{ $tpoll->titel }}" aria-describedby="TpollTitle">
                    @error('titel')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </div>
                <div id="TpollTitle" class="form-text">{{ __('Please choose a title for you Tpoll') }}</div>
            </div>
            {{-- Input Info --}}
            <div class="mb-3">
                <label for="info" class="form-label">{{ __('Short Info') }}</label>
                <div class="input-group has-validation">
                    <input type="text" class="form-control" id="info" name="info" value="{{ $tpoll->info }}" aria-describedby="TpollInfo">
                    @error('info')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </div>
                <div id="TpollInfo" class="form-text">{{ __('Please choose a Description for you Tpoll') }}</div>
            </div>
            {{-- Input Description --}}
            <div class="mb-3">
                <label for="beschreibung" class="form-label">{{ __('Description') }}</label>
                <div class="input-group has-validation">
                    <textarea class="form-control" id="beschreibung" name="beschreibung" aria-describedby="TpollDescription" rows="5">{{ $tpoll->beschreibung }}</textarea>
                    @error('beschreibung')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </div>
                <div id="TpollDescription" class="form-text">{{ __('Please choose a short Description for you Tpoll') }}</div>
            </div>
            {{-- Input Status --}}
            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status1" value="2" @if ($tpoll->status == 2) checked @endif>
                    <label class="form-check-label" for="status1">
                        {{ __('Active') }}
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status2" value="1" @if ($tpoll->status == 1) checked @endif>
                    <label class="form-check-label" for="status2">
                        {{ __('In Progress') }}
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status3" value="0" @if ($tpoll->status == 0) checked @endif>
                    <label class="form-check-label" for="status3">
                       {{ __('Archived') }}
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
        </form>
    </div>
</x-app-layout>
