@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 ">
                <div class="card">
                    {{-- admin view of all adoption requests including approved,denied --}}
                    <div class="card-header">View Adoption Request History</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Animal ID</th>
                                    <th>User ID</th>
                                    <th>Date Requested</th>
                                    <th>Status</th>
                                    <th>Date Handled</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($adoptions as $adoption)
                                {{-- only display requests if the adoption status was approved or denied and user is admin--}}
                                @if (($adoption['status'] == 'Approved' || $adoption['status'] == 'Denied' && Gate::denies('publicview') == false))
                                    <tr>
                                        <td>{{ $adoption['animalID'] }}</td>
                                        <td>{{ $adoption['userID'] }}</td>
                                        <td>{{ $adoption['created_at'] }}</td>
                                @if (($adoption['status'] == 'Approved'))
                                        <td><b><p class="text-success"> {{ $adoption['status'] }} </b></td>
                                @elseif (($adoption['status'] == 'Denied'))
                                        <td><b><p class="text-danger"> {{ $adoption['status'] }} </b></td>
                                @endif
                                        <td>{{ $adoption['updated_at'] }}</td>

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
