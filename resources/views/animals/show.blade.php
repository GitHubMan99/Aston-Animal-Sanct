@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 ">
                <div class="card">

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

                    <div class="card-header">View animal details</div>
                    <div class="card-body">
                        <table class="table table-striped" border="2">
                            <tr>
                                <td> <b>Animal Name: </th>
                                <td> {{ $animal['name'] }}</td>
                            </tr>

                            <tr>
                                <td> <b>Animal Type: </th>
                                <td> {{ $animal['animal_type'] }}</td>
                            </tr>

                            <tr>
                                <th>Date of Birth: </th>
                                <td>{{ $animal->date_of_birth }}</td>
                            </tr>

                            <tr>
                                <td><b>Description: </th>
                                <td style="max-width:75px;">{{ $animal->description }}</td>
                            </tr>

                            <tr>
                                <th>Availability: </th>
                                <td>{{ $animal->availability }}</td>
                            </tr>


                        </table>

                        {{-- retrieve images of the animal from storage and display as carousel --}}
                        <div class="text-center">
                            <div id="imageSlideshow" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img style="width:600px;height:600px"
                                            src="{{ asset('storage/images/' . $animal->image) }}" alt="First slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img style="width:600px;height:600px"
                                            src="{{ asset('storage/images/' . $animal->image_2) }}" alt="Second slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img style="width:600px;height:600px"
                                            src="{{ asset('storage/images/' . $animal->image_3) }}" alt="Third slide">
                                    </div>
                                </div>

                                <a class="carousel-control-prev" href="#imageSlideshow" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#imageSlideshow" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>

                        <table>
                            <tr><br>
                                <td><a href="{{ route('list.index') }}" class="btn btn-dark" role="button">Back to the
                                        list</a>
                                </td>

                                @if (Gate::denies('publicview') == true)
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

                                {{-- Only show edit and delete buttons if user is admin --}}
                                @if (Gate::denies('publicview') == false)
                                    <td><a href="{{ route('list.edit', ['list' => $animal['id']]) }}"
                                            class="btn btn-warning">Edit</a></td>
                                    <td>
                                        <form action="{{ route('list.destroy', ['list' => $animal['id']]) }}"
                                            method="post"> @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
                                @endif
                            </tr> <br>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
