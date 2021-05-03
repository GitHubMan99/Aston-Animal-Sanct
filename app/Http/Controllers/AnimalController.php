<?php

namespace App\Http\Controllers;


use App\Models\Animal;
use Gate;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    // admin only view for displaying the create page
    public function create()
    {
        if (Gate::denies('publicview') == false) {
            return view('animals.create');
        } else {
            return view('animals.access');
        }
    }

    // display a listing of animals with pagination
    public function index()
    {
        $animals = Animal::sortable()->paginate(4);

        return view('animals.index')->with('animals', $animals);
    }

    // view specific animal
    public function show($id)
    {
        $animal = Animal::find($id);
        return view('animals.show', compact('animal'));
    }

    // delete a specific animal
    public function destroy($id)
    {
        $animal = Animal::find($id);
        $animal->delete();
        return redirect('list');
    }

    // edit a specific animal's details.
    public function edit($id)
    {
        $animal = Animal::find($id);
        return view('animals.edit', compact('animal'));
    }

    // update the selected animal's data.
    public function update(Request $request, $id)
    {
        $animal = Animal::find($id);
        $this->validate(request(), [
            'name' => 'required|alpha|max:25',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2000',
            'image_2' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2000',
            'image_3' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2000',

        ]);
        $animal->name = $request->input('name');
        $animal->animal_type = $request->input('animal_type');
        $animal->date_of_birth = $request->input('date_of_birth');
        $animal->description = $request->input('description');
        $animal->availability = $request->input('availability');
        $animal->updated_at = now();

        //Handles the uploading of the image
        if ($request->hasFile('image')) {

            //Gets the filename with the extension
            $fileNameWithExt = $request->file('image')->getClientOriginalName();

            //just gets the filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            //Just gets the extension
            $extension = $request->file('image')->getClientOriginalExtension();

            //Gets the filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;

            //Uploads the image
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
            $animal->image = $fileNameToStore;
        }

        //Handles the uploading of the second image
        if ($request->hasFile('image_2')) {

            //Gets the filename with the extension
            $fileNameWithExt = $request->file('image_2')->getClientOriginalName();

            //just gets the filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            //Just gets the extension
            $extension = $request->file('image_2')->getClientOriginalExtension();

            //Gets the filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;

            //Uploads the image
            $path = $request->file('image_2')->storeAs('public/images', $fileNameToStore);
            $animal->image_2 = $fileNameToStore;
        }
        //Handles the uploading of the third image
        if ($request->hasFile('image_3')) {

            //Gets the filename with the extension
            $fileNameWithExt = $request->file('image_3')->getClientOriginalName();

            //just gets the filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            //Just gets the extension
            $extension = $request->file('image_3')->getClientOriginalExtension();

            //Gets the filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;

            //Uploads the image
            $path = $request->file('image_3')->storeAs('public/images', $fileNameToStore);
            $animal->image_3 = $fileNameToStore;
        }

        $animal->save();
        return redirect('list');
    }



    // supports storing of a new animal added to the database.
    public function store(Request $request)
    {
        // form validation
        $animal = $this->validate(request(), [
            'name' => 'required|alpha|max:25',
            'date_of_birth' => 'required',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2000',
            'image_2' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2000',
            'image_3' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2000',
        ]);


        //Handles the uploading of the image
        if ($request->hasFile('image')) {

            //Gets the filename with the extension
            $fileNameWithExt = $request->file('image')->getClientOriginalName();

            //just gets the filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            //Just gets the extension
            $extension = $request->file('image')->getClientOriginalExtension();

            //Gets the filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;

            //Uploads the image
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        //Handles the uploading of the second image
        if ($request->hasFile('image_2')) {

            //Gets the filename with the extension
            $fileNameWithExt = $request->file('image_2')->getClientOriginalName();

            //just gets the filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            //Just gets the extension
            $extension = $request->file('image_2')->getClientOriginalExtension();

            //Gets the filename to store
            $fileNameToStoreTwo = $filename . '_' . time() . '.' . $extension;

            //Uploads the image
            $path = $request->file('image_2')->storeAs('public/images', $fileNameToStoreTwo);
        } else {
            $fileNameToStoreTwo = 'noimage.jpg';
        }

        //Handles the uploading of the third image
        if ($request->hasFile('image_3')) {

            //Gets the filename with the extension
            $fileNameWithExt = $request->file('image_3')->getClientOriginalName();

            //just gets the filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            //Just gets the extension
            $extension = $request->file('image_3')->getClientOriginalExtension();

            //Gets the filename to store
            $fileNameToStoreThree = $filename . '_' . time() . '.' . $extension;

            //Uploads the image
            $path = $request->file('image_3')->storeAs('public/images', $fileNameToStoreThree);
        } else {
            $fileNameToStoreThree = 'noimage.jpg';
        }


        // create a animal object and set its values from the input
        $animal = new Animal;
        $animal->name = $request->input('name');
        $animal->animal_type = $request->input('animal_type');
        $animal->date_of_birth = $request->input('date_of_birth');
        $animal->description = $request->input('description');
        $animal->availability = 'Available';
        $animal->image = $fileNameToStore;
        $animal->image_2 = $fileNameToStoreTwo;
        $animal->image_3 = $fileNameToStoreThree;

        // save the animal object
        $animal->save();

        // generate a redirect HTTP response with a success message
        return back()->with('success', 'Animal has been added');
    }


    // retrieves animal type requested for filtering and displays results
    public function onFilter(Request $request)
    {
        if ($request->type == "") {

            $animals = Animal::sortable()->paginate(4);
        } else {

            $animals = Animal::where('animal_type', $request->type)->sortable()->paginate(4);
        }

        return view('animals.index')->with('animals', $animals);
    }
}
