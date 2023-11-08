<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// data is coming from the Model
use App\Models\Listing;

// here we load all are views or controllers
// listings, posts, profiles, etc could be the name of the resource

// All Listings
Route::get('/', function () {
    return view('listings', [
        'heading' => 'Latest Listings',
        // data is coming from the Listing.php Model
        // all() is a method from the Eloquent Model
        'listings' => Listing::all(),
    ]);
});

// Single Listing (wildcard {pass in id})
Route::get('/listings/{id}', function ($id) {
    return view('listing', [
        // get listing value from the Listing model
        // find() is a method from the Eloquent Model
        'listing' => Listing::find($id),
    ]);
});
