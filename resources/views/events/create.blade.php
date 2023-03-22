<x-app-layout>
    <x-slot name="header">
        <h4>
            {{ __('Edit Event') }}
        </h4>
    </x-slot>

    <!-- event Form-->
    <div class="container mt-5 p-3 bg-body rounded">
        <form method="post" action="{{ route('events.store') }}">
            @csrf
            {{-- Input Title --}}
            <div class="mb-3">
                <label for="was" class="form-label">{{ __('Title') }}</label>
                <div class="input-group has-validation">
                    <input type="text" class="form-control" id="was" name="was" value="" aria-describedby="eventWas">
                    @error('was')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </div>
                <div id="eventWas" class="form-text">{{ __('Please choose a title for your event') }}</div>
            </div>
            {{-- Input Title --}}
            <div class="mb-3">
                <label for="ort" class="form-label">{{ __('Location') }}</label>
                <div class="input-group has-validation">
                    <input type="text" class="form-control" id="ort" name="ort" value="" aria-describedby="eventOrt">
                    @error('ort')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </div>
                <div id="eventOrt" class="form-text">{{ __('Enter the Location of your event') }}</div>
            </div>
            {{-- Input People --}}
            <div class="mb-3">
                <label for="need" class="form-label">{{ __('People needed') }}</label>
                <div class="input-group has-validation">
                    <input type="text" class="form-control" id="need" name="need" value="" aria-describedby="eventNeed">
                    @error('need')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </div>
                <div id="eventNeed" class="form-text">{{ __('Enter the amount of people you need') }}</div>
            </div>
            {{-- Select Tpoll --}}
            <div class="mb-3">
                <label for="tpoll_id" class="form-label">{{ __('Tpoll') }}</label>
                <div class="input-group has-validation">
                    <select class="form-select" aria-label="{{ __('Tpoll') }}" id="tpoll" name="tpoll_id" value="" aria-describedby="eventTpoll">
                        @foreach ($tpolls as $tpoll)
                            <option value="{{ $tpoll->id }}">{{ $tpoll->titel }}</option>
                        @endforeach
                      </select>
                    @error('datum')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </div>
                <div id="eventTpoll" class="form-text">{{ __('Select the Tpoll this Event belongs to') }}</div>
            </div>

            {{-- Input Date --}}
            <div class="mb-3">
                <label for="date" class="form-label">{{ __('Date') }}</label>
                <div class="input-group has-validation">
                    <input type="date" class="form-control" id="date" name="datum" value="" aria-describedby="eventDate">
                    @error('datum')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </div>
                <div id="eventDate" class="form-text">{{ __('Please choose the Date of your event') }}</div>
            </div>
            {{-- Input start --}}
            <div class="row mb-3">
                <div class="col">
                    <label for="start" class="form-label">{{ __('Start') }}</label>
                    <div class="input-group has-validation">
                        <input type="time" class="form-control" id="start" name="beginn" value="" aria-describedby="eventStart">
                        @error('beginn')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div id="eventStart" class="form-text">{{ __('Please choose the Start of your event') }}</div>
                </div>
                <div class="col">
                    <label for="end" class="form-label">{{ __('End') }}</label>
                    <div class="input-group has-validation">
                        <input type="time" class="form-control" id="end" name="ende" value="" aria-describedby="eventEnde">
                        @error('ende')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div id="eventEnde" class="form-text">{{ __('Please choose the Start of your event') }}</div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
        </form>
    </div>
</x-app-layout>
