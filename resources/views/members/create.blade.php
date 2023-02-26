<x-app-layout>
    <x-slot name="header">
        <h4>
            {{ __('Create Member') }}
        </h4>
    </x-slot>

    {{-- Edit Section --}}
    <div class="container p-3 mt-5 bg-body rounded">
        <form method="post" action="{{ route('members.store') }}">
            @csrf
            {{-- Input Name --}}
            <div class="row mb-3">
                <div class="col">
                    <label for="name" class="form-label">{{ __('Name') }}</label>
                    <div class="input-group has-validation">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="" aria-describedby="eventName">
                        <div class="invalid-feedback">@error('name') {{ $message }} @enderror</div>
                    </div>
                    <div id="eventName" class="form-text">{{ __('Name of this Member') }}</div>
                </div>
                <div class="col">
                    <label for="surname" class="form-label">{{ __('Surname') }}</label>
                    <div class="input-group has-validation">
                        <input type="text" class="form-control @error('surname') is-invalid @enderror" id="surname" name="surname" value="" aria-describedby="eventSurname">
                        <div class="invalid-feedback">@error('surname') {{ $message }} @enderror</div>
                    </div>
                    <div id="eventSurname" class="form-text">{{ __('Surname of this Member') }}</div>
                </div>
            </div>

            {{-- Phone Number --}}
            <div class="mb-3">
                <label for="phone" class="form-label">{{ __('Phone') }}</label>
                <div class="input-group has-validation">
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="" aria-describedby="eventPhone">
                    <div class="invalid-feedback">@error('phone') {{ $message }} @enderror</div>
                </div>
                <div id="eventPhone" class="form-text">{{ __('Phone Number of this Member') }}</div>
            </div>
            {{-- Input status --}}
            <div class="mb-3">
                <label class="form-check-label" for="status1">Status</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status1" value="1">
                    <label class="form-check-label" for="status1">
                        {{ __('active') }}
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status2" value="0">
                    <label class="form-check-label" for="status2">
                        {{ __('not active') }}
                    </label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</x-app-layout>
