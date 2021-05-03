@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 ">
                <div class="card">
                    <div class="card-header">View Pending Adoption Requests</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Animal ID</th>
                                    <th>User ID</th>
                                    <th>User's Name</th>
                                    <th>Date Requested</th>
                                    <th>Status</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if ($adoptions->count() == 0)
                                <tr>
                                    <td style="text-align:center" colspan="8">There are no pending requests.</td>
                                </tr>
                                @endif

                                @foreach ($adoptions as $adoption)
                                {{-- if adoption status is pending and user is admin, display request --}}
                                @if (($adoption['status'] == 'Pending' && Gate::denies('publicview') == false) )
                                    <tr>
                                        <td> <img style="width:75px;height:75px"
                                            src="{{ asset('storage/images/' . \App\Models\Animal::select('image')->where('id', $adoption['animalID'])->get()->first()['image']) }}"></td>
                                        <td>{{ $adoption['animalID'] }}</td>
                                        <td>{{ $adoption['userID'] }}</td>
                                        <td>{{ \App\Models\User::select('name')->where('id', $adoption['userID'])->get()->first()['name'] }}</td>
                                        <td>{{ $adoption['created_at'] }}</td>
                                        <td><b>{{ $adoption['status'] }}</td></b>

                                        <td>
                                            <form
                                                action="{{ action([App\Http\Controllers\AdoptionsController::class, 'approve'], ['request' => $adoption['id']]) }}"
                                                method="GET">
                                                @csrf
                                                {{-- <input name="_method" type="hidden"> --}}
                                                <input name="animalID" type="hidden" value="{{ $adoption['animalID'] }}">
                                                <input name="userID" type="hidden" value="{{ $adoption['userID'] }}">

                                                <button class="btn btn-success" type="submit"> Approve</button>
                                            </form>
                                        </td>

                                        <td>
                                            <form
                                                action="{{ action([App\Http\Controllers\AdoptionsController::class, 'deny'], ['request' => $adoption['id']]) }}"
                                                method="GET">
                                                @csrf
                                                {{-- <input name="_method" type="hidden"> --}}
                                                <input name="animalID" type="hidden" value="{{ $adoption['animalID'] }}">
                                                <input name="userID" type="hidden" value="{{ $adoption['userID'] }}">

                                                <button class="btn btn-danger" type="submit"> Deny</button>
                                            </form>
                                        </td>

                                    </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
