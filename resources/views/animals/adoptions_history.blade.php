@extends('layouts.app')
@section('content')
    @if (Gate::denies('publicview') == true)
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 ">
                    <div class="card">
                        {{-- User view for their previous adoption requests --}}
                        <div class="card-header">My Adoption Requests History</div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>User's Name</th>
                                        <th>Animal ID</th>
                                        <th>Animal Name</th>
                                        <th>Date Requested</th>
                                        <th>Status</th>


                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($adoptions as $adoption)
                                        {{-- display requests only made by current user logged in --}}
                                        @if ($adoption['userID'] == Auth::id())
                                            <tr>
                                                <td> <img style="width:75px;height:75px"
                                                        src="{{ asset('storage/images/' .\App\Models\Animal::select('image')->where('id', $adoption['animalID'])->get()->first()['image'],) }}">
                                                </td>
                                                <td>{{ \App\Models\User::select('name')->where('id', $adoption['userID'])->get()->first()['name'] }}
                                                </td>
                                                <td>{{ $adoption['animalID'] }}</td>
                                                <td>{{ \App\Models\Animal::select('name')->where('id', $adoption['animalID'])->get()->first()['name'] }}
                                                </td>
                                                <td>{{ $adoption['created_at'] }}</td>
                                                @if ($adoption['status'] == 'Approved')
                                                    <td><b>
                                                            <p class="text-success"> {{ $adoption['status'] }}
                                                        </b>
                                                    </td>
                                                @elseif (($adoption['status'] == 'Denied'))
                                                    <td><b>
                                                            <p class="text-danger"> {{ $adoption['status'] }}
                                                        </b>
                                                    </td>
                                                @elseif (($adoption['status'] == 'Pending'))
                                                    <td><b>{{ $adoption['status'] }} </b></td>

                                                @endif
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
    @endif
@endsection
