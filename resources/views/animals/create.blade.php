<!-- inherite master template app.blade.php -->
@extends('layouts.app')
<!-- define the content section -->
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 ">
            <div class="card">

                <div class="card-header">Add a new animal</div>
                <!-- display the errors -->
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul> @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li> @endforeach
                    </ul>
                </div><br /> @endif

                <!-- display the success status -->
                @if (\Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ \Session::get('success') }}</p>
                </div><br /> @endif

                <!-- define the form -->
                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{url('list') }}" enctype="multipart/form-data">
                        @csrf
                        <!-- name field -->
                        <div class="col-md-8">
                            <b><label>Animal Name: </label>
                            <br><input type="text" required name="name" placeholder="Animal name" />
                        </div>

                        <!-- animal type field -->
                        <div class="col-md-8">
                        <br><label>Type of Animal: </label>
                            <br><select name="animal_type">
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
                            <br><input type="date" required name="date_of_birth" placeholder="Date of birth" />
                        </div>

                        <!-- description field -->
                        <div class="col-md-8">
                        <br><label>Description: </label>
                            <br> <textarea rows="4" cols="50" name="description">  </textarea>
                        </div>

                        <!-- choose images button -->
                        <div class="col-md-8">
                            <label>Images</label>

                            <br><input type="file" required name="image" placeholder="Image file"  /><br>
                            <br><input type="file" required name="image_2" placeholder="Image file" /><br>
                            <br><input type="file" required name="image_3" placeholder="Image file" /><br>
                        </div>

                        <div class="col-md-6 col-md-offset-4">
                        <br><input type="submit" class="btn btn-dark" />
                            <input type="reset" class="btn btn-dark" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
