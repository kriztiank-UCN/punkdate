<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

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

    // Store Listing Data
    public function store(Request $request)
    {
        // dd($request->all());
        // dd($request->file('image'));

        $formFields = $request->validate([
            // pass in the name of the table & the field that needs to be unique
            'name' => ['required', Rule::unique('listings', 'name')],
            'age' => ['required', 'min:18', 'max:100', 'numeric'],
            'location' => 'required',
            'email' =>  ['required', 'email', Rule::unique('listings', 'email')], // must be formatted as an email
            'tags' => 'required',
            'description' => 'required'
        ]);
        // if any of the form fields fail, laravel sends back an error message to the create view

        // change 'default' => env('FILESYSTEM_DISK', 'local'), to default' => env('FILESYSTEM_DISK', 'public'), in config/filesystems.php
        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('images', 'public');
        }

        // add the currently logged in users, user_id to the form fields when submitting the form
        $formFields['user_id'] = auth()->id();

        // use the create method on the model to create a new listing, pass in the form fields
        Listing::create($formFields);

        return redirect('/')->with('message', 'Profile created successfully!');
    }

    // Show Edit Form
    public function edit(Listing $listing)
    {
        // dd($listing->name);
        return view('listings.edit', ['listing' => $listing]);
    }

    // Edit Update Listing Data
    public function update(Request $request, Listing $listing)
    {
        // Make sure logged in user is owner
        if ($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $formFields = $request->validate([
            'name' => 'required',
            'age' => ['required', 'min:18', 'max:100', 'numeric'],
            'location' => 'required',
            'email' =>  ['required', 'email'], // must be formatted as an email
            'tags' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('images', 'public');
        }

        // get the current listing, pass in the form fields
        $listing->update($formFields);

        return back()->with('message', 'Profile updated successfully!');
    }

    // Delete Listing
    public function destroy(Listing $listing)
    {
        // Make sure logged in user is owner
        if ($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        //FIXME delete the image from the public disk
        // if($listing->logo && Storage::disk('public')->exists($listing->logo)) {
        //     Storage::disk('public')->delete($listing->logo);
        // }

        $listing->delete();
        return redirect('/')->with('message', 'Profile deleted successfully');
    }

    // Manage Listings
    public function manage()
    {
        // pass in the users listings into the listings.manage view, get the currently logged in user, then get the listings for that user
        return view('listings.manage', ['listings' => request()->user()->listings()->get()]);
    }
}
