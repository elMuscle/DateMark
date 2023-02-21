<x-app-layout>
    <x-slot name="header">
        <h4>
            {{ __('Member') }}
        </h4>
    </x-slot>

    <!-- Print out Tpolls-->
    <div class="container mt-5">
        <div class="p-2 bg-body rounded">
            <h4>{{ $member->vorname }} {{ $member->nachname }} </h4>
            <p>{{ __('Phone') }}: {{ $member->telefon }}</p>
        </div>
        <div class="p-2 bg-body rounded">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteUser">
                {{ __('Delete Member') }}
            </button>

            <!-- Modal -->
            <div class="modal fade" id="deleteUser" tabindex="-1" aria-labelledby="deleteUser" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" action="{{ route('members.destroy', ['member' => $member->id])}}">
                        @csrf
                        @method('delete')

                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('Delete Member') }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                         {{ __('Do you really want to delete') }} <b>{{ $member->vorname }} {{ $member->nachname }}</b>
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
    </div>
</x-app-layout>
