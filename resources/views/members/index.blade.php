<x-app-layout>
    <x-slot name="header">
        <h4>
            {{ __('Members') }}
        </h4>
    </x-slot>

    <!-- Print out Tpolls-->
    <div class="container mt-5">
        <div class="p-2 bg-body rounded">
            <table class="table table-striped">
                <thead class="table-primary">
                <tr>
                    <th scope="col">{{ __('ID') }}</th>
                    <th scope="col">{{ __('Surname') }}</th>
                    <th scope="col">{{ __('Name') }}</th>
                    <th scope="col">{{ __('Phone') }}</th>
                    <th scope="col">{{ __('Status') }}</th>
                    <th scope="col">{{ __('Edit') }}</th>
                </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($members as $member)
                        <tr>
                            <td>{{ $member->id }}</td>
                            <td>{{ $member->surname }}</td>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->phone }}</td>
                            <td>@if ($member->status == 1)
                                <span class="badge text-bg-success">{{ __('active') }}</span>
                            @else
                            <span class="badge text-bg-danger">{{ __('not active') }}</span>
                            @endif</td>
                            <td><a href="{{ route('members.edit',['member'=>$member->id]) }}" type="button" class="btn btn-outline-warning">{{ __('Edit') }}</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
