@extends('layouts.app')
@section('content')
    @if (Gate::denies('publicview') == false)
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 ">
                    <div class="card">
                        {{-- Admin view for owners of adopted animals --}}
                        <div class="card-header">View Owners of Adopted Animals</div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Animal ID</th>
                                        <th>Animal Name</th>
                                        <th>User ID</th>
                                        <th>Owner's Name</th>
                                        <th>Date Adopted</th>



                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($adoptions as $adoption)
                                    {{-- only display approved adoption requests and if the user is admin--}}
                                    @if (($adoption['status'] == 'Approved' && Gate::denies('publicview') == false))
                                        <tr>
                                            <td> <img style="width:75px;height:75px"
                                                src="{{ asset('storage/images/' . \App\Models\Animal::select('image')->where('id', $adoption['animalID'])->get()->first()['image']) }}"></td>
                                            <td>{{ $adoption['animalID'] }}</td>
                                            <td>{{ \App\Models\Animal::select('name')->where('id', $adoption['animalID'])->get()->first()['name'] }}</td>
                                            <td>{{ $adoption['userID'] }}</td>
                                            <td>{{ \App\Models\User::select('name')->where('id', $adoption['userID'])->get()->first()['name'] }}</td>
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
    @endif
@endsection
