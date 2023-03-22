<x-app-layout>
    <x-slot name="header">
        <h4>
            {{ __('Edit Event') }}
        </h4>
    </x-slot>

    <!-- event Form-->
    <div class="container mt-5 p-3 bg-body rounded">
        <form method="post" action="{{ route('events.update', ['event' => $event->id]) }}">
            @csrf
            @method('PUT')
            {{-- Input Title --}}
            <div class="mb-3">
                <label for="was" class="form-label">{{ __('Title') }}</label>
                <div class="input-group has-validation">
                    <input type="text" class="form-control" id="was" name="was" value="{{ $event->was }}" aria-describedby="eventWas">
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
                    <input type="text" class="form-control" id="ort" name="ort" value="{{ $event->ort }}" aria-describedby="eventOrt">
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
                    <input type="text" class="form-control" id="need" name="need" value="{{ $event->need }}" aria-describedby="eventNeed">
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
                    <select class="form-select" aria-label="{{ __('Tpoll') }}" id="tpoll" name="tpoll_id" value="" aria-describedby="eventTpoll" disabled>
                        <option selected>{{ $event->tpoll->titel }}</option>
                      </select>
                    @error('datum')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </div>
                <div id="eventTpoll" class="form-text">{{ __('U can\'t change this!') }}</div>
            </div>

            {{-- Input Date --}}
            <div class="mb-3">
                <label for="date" class="form-label">{{ __('Date') }}</label>
                <div class="input-group has-validation">
                    <input type="date" class="form-control" id="date" name="datum" value="{{ $event->datum->format('Y-m-d') }}" aria-describedby="eventDate">
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
                        <input type="time" class="form-control" id="start" name="beginn" value="{{ $event->beginn->format('H:i') }}" aria-describedby="eventStart">
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
                        <input type="time" class="form-control" id="end" name="ende" value="{{ $event->ende->format('H:i') }}" aria-describedby="eventEnde">
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
    <div class="container p-3 bg-body rounded mt-3">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteEvent">
            {{ __('Delete Event') }}
        </button>

        <!-- Modal -->
        <div class="modal fade" id="deleteEvent" tabindex="-1" aria-labelledby="deleteEvent" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="{{ route('events.destroy', ['event' => $event->id])}}">
                    @csrf
                    @method('delete')

                    <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('Delete Event') }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                     {{ __('Do you really want to delete') }} <b>{{ $event->was }}</b>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-danger">{{ __('Delete') }}</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</x-app-layout>
