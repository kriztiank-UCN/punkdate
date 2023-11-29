<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    // show all listings
    public function index()
    {
        // dd(request());
        return view('listings.index', [
            // sort, filter & search functionality is in the Listing.php model
            'listings' => Listing::latest()->filter(Request(['tag', 'search']))->simplePaginate(4)
        ]);
    }

    // Show single listing
    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    // Show Create Form
    public function create()
    {
        return view('listings.create');
    }

    // Store Create Data
    public function store(Request $request) {
        // dd($request->all());
        $formFields = $request->validate([
            // pass in the name of the table & the field that needs to be unique
            'name' => ['required', Rule::unique('listings', 'name')],
            'age' => 'required',
            'location' => 'required',
            'email' => ['required', 'email'], // make unique, must be formatted as an email
            'tags' => 'required',
            'description' => 'required'
        ]);
        // if any of the form fields fail, laravel sends back an error message to the create view

        // if($request->hasFile('logo')) {
        //     $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        // }

        // $formFields['user_id'] = auth()->id();

        // use the create method on the model to create a new listing, pass in the form fields
        Listing::create($formFields);

        return redirect('/')->with('message', 'Listing created successfully!');
    }
}
