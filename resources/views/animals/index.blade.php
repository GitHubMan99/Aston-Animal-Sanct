@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">

                    <!-- display the errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                    @endif

                    <!-- display the success status -->
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <p>{{ \Session::get('success') }}</p>
                        </div><br />
                    @endif

                    <!-- display an error status -->
                    @if (\Session::has('error'))
                        <div class="alert alert-danger">
                            <p>{{ \Session::get('error') }}</p>
                        </div><br />
                    @endif


                    @if (Gate::denies('publicview') == false)
                        <div class="card-header">View all animals</div>
                    @else
                        <div class="card-header">All animals available for adoption</div>
                    @endif

                    {{-- Show filter options, on click of search button call 'onFilter' method @AnimalController --}}
                    <div class="card-body float-right">
                        <form class="form-inline"
                            action="{{ action([App\Http\Controllers\AnimalController::class, 'onFilter'], 0) }}"
                            method="get">
                            @csrf
                            <label for="type_filter">Filter by Animal Type: &nbsp;</label>
                            <select class="form-control" id="type_filter" name="type">
                                <option value="">Select Type</option>
                                <option value="Dog">Dog</option>
                                <option value="Cat">Cat</option>
                                <option value="Rabbit">Rabbit</option>
                                <option value="Hamster">Hamster</option>
                                <option value="Bird">Bird</option>
                                <option value="Fish">Fish</option>
                                <option value="Reptile">Reptile</option>
                                <option value="Other">Other</option>

                            </select>

                            <button style="margin-left: 10px" class="btn btn-success" type="submit">
                                Search</button>

                            <button style="margin-left: 10px" class="btn btn-primary" href="{{ url('list') }}"> Clear
                                filter</button>

                        </form>

                        {{-- Table headers of listed data with @sortablelink for sorting --}}
                        <table class="table table-striped" id="animal_table">
                            <br>
                            <thead>
                                <tr>
                                    @if (Gate::denies('publicview') == false)
                                        <th style="width:10%; text-align:center">@sortablelink('id','ID')</th>
                                    @endif
                                    <th style="width:15%; text-align: center">Images</th>
                                    <th style="width:15%; text-align: center">@sortablelink('name','Name')</th>
                                    <th style="width:15%; text-align: center">Type</th>
                                    <th style="width:15%; text-align: center; white-space: nowrap">
                                        @sortablelink('date_of_birth','Date of Birth')
                                    </th>
                                    <th style="width:15%; text-align: center">Availability</th>
                                    <th style="text-align:center" colspan="3"></th>
                                </tr>
                            </thead>

                            {{-- table body for displaying data. Retrieves ID, images, name, type, d.o.b, availability from storage.  --}}
                            <tbody>

                                @foreach ($animals as $animal)
                                    {{-- if the animal availability is available and the user is not an administrator then the animal will be displayed
                                        or if the user is admin display the animal even if animal is unavailable --}}
                                    @if (($animal['availability'] == 'Available' && Gate::denies('publicview') == true) || Gate::denies('publicview') == false)
                                        <tr>

                                            @if (Gate::denies('publicview') == false)
                                                <td style="text-align:center">{{ $animal->id }}</td>
                                            @endif
                                            <td>
                                                <div id="imageSlideshow" class="carousel slide" data-ride="carousel">
                                                    <div class="carousel-inner">
                                                        <div class="carousel-item active">
                                                            <img style="width:100px;height:100px"
                                                                src="{{ asset('storage/images/' . $animal->image) }}">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img style="width:100px;height:100px"
                                                                src="{{ asset('storage/images/' . $animal->image_2) }}">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img style="width:100px;height:100px"
                                                                src="{{ asset('storage/images/' . $animal->image_3) }}">
                                                        </div>
                                                    </div>
                                            </td>

                                            <td style="text-align:center">{{ $animal->name }}</td>
                                            <td style="text-align:center">{{ $animal->animal_type }}</td>
                                            <td style="text-align:center">{{ $animal->date_of_birth }}</td>
                                            <td style="text-align:center">{{ $animal->availability }}</td>

                                            {{-- View button to select specific animal and see details --}}
                                            <td><a href="{{ route('list.show', ['list' => $animal['id']]) }}"
                                                    class="btn btn-dark">View</a>
                                            </td>

                                            {{-- Show Edit and Delete buttons if user is admin --}}
                                            @if (Gate::denies('publicview') == false)
                                                <td><a href="{{ route('list.edit', ['list' => $animal['id']]) }}"
                                                        class="btn btn-warning">Edit</a>
                                                </td>

                                                {{-- deletes an animal by calling 'destroy' method @AnimalController --}}
                                                <td>
                                                    <form
                                                        action="{{ action([App\Http\Controllers\AnimalController::class, 'destroy'], ['list' => $animal['id']]) }}"
                                                        method="post">
                                                        @csrf
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <button class="btn btn-danger" type="submit">
                                                            Delete</button>
                                                    </form>
                                                </td>

                                            @else

                                                {{-- store adoption request with the animal id when adopt button is clicked --}}
                                                <td>
                                                    <form
                                                        action="{{ action([App\Http\Controllers\AdoptionsController::class, 'store'], ['list' => $animal['id']]) }}"
                                                        method="post">
                                                        @csrf
                                                        <input name="_method" type="hidden">
                                                        <input name="animalID" type="hidden" value="{{ $animal['id'] }}">
                                                        <button class="btn btn-success" type="submit">
                                                            Adopt</button>

                                                    </form>
                                                </td>
                                            @endif

                                        </tr>
                                    @endif

                                @endforeach
                            </tbody>
                        </table>


                    </div>


                </div>

                {{-- support pagination of animals table --}}
                <br> {!! $animals->appends(\Request::except('page'))->render() !!}
            </div>
        </div>
    </div>
@endsection
