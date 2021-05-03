@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 ">
                <div class="card">
                    <div class="card-header">Edit and update the animal</div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                    @endif

                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <p>{{ \Session::get('success') }}</p>
                        </div><br />
                    @endif

                    <div class="card-body">
                        <form class="form-horizontal" method="POST"
                            action="{{ route('list.update', ['list' => $animal['id']]) }}" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf

                            <!-- name field -->
                            <div class="col-md-8">
                                <b><label>Animal Name: </label>
                                    <br><input type="text" name="name" value="{{ $animal->name }}" />
                            </div>

                            <!-- animal type field -->
                            <div class="col-md-8">
                                <br><label>Type of Animal: </label>
                                <br><select name="animal_type" value="{{ $animal->animal_type }}">
                                    <option value="dog">Dog</option>
                                    <option value="cat">Cat</option>
                                    <option value="rabbit">Rabbit</option>
                                    <option value="hamster">Hamster</option>
                                    <option value="bird">Bird</option>
                                    <option value="fish">Fish</option>
                                    <option value="reptile">Reptile</option>
                                    <option value="other">Other</option>
                                </select>

                            </div>

                            <!-- date of birth field -->
                            <div class="col-md-8">
                                <br><label>Date of Birth: </label>
                                <br><input type="date" name="date_of_birth" value="{{ $animal->date_of_birth }}" />
                            </div>


                            <!-- description field -->
                            <div class="col-md-8">
                                <br><label>Description: </label>
                                <br> <textarea rows="4" cols="50" name="description"> {{ $animal->description }} </textarea>
                            </div>


                            <div class="col-md-8">
                                <br><label>Availability: </label>
                                <br><select name="availability" value="{{ $animal->availability }}">
                                    <option value="Available">Yes</option>
                                    <option value="Unavailable">No</option>
                                </select>
                            </div>

                            <!-- choose images button -->
                            <div class="col-md-8">
                                <br><label>Images</label>

                                <br><input type="file"  name="image" value="{{ $animal->image }}" />
                                <input type="file"  name="image_2" value="{{ $animal->image_2 }}" />
                                <input type="file"  name="image_3" value="{{ $animal->image_3 }}" /><br>
                            </div>


                            <div class="col-md-6 col-md-offset-4">
                                <br><input type="submit" class="btn btn-success" />
                                <input type="reset" class="btn btn-danger" />
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
