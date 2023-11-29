<?php

// data is coming from the Model
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;

// here we load all are views or controllers
// listings, posts, profiles, etc could be the name of the resource

// create a new route, a new controller method and a new view for each resource

// Common Resource Routes:
// index - Show all listings
// show - Show single listing (keep at the bottom of the file)
// create - Show form to create new listing on create
// store - Store new listing
// edit - Show form to edit listing 
// update - Update listing
// destroy - Delete listing  

// All Listings
// Goes to ListingController.php and the index method loads the view
// Route to the method that loads the view
Route::get('/', [ListingController::class, 'index']);

// Show Create Form
Route::get('/listings/create', [ListingController::class, 'create']);

// Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);
