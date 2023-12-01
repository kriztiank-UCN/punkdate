<?php

// data is coming from the Model
// use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;

// here we load all are views or controllers
// listings, posts, profiles, etc could be the name of the resource

// create a new route, a new controller method and a new view for each resource

// Common Resource Routes:
// index - Show all listings
// show - Show single listing (keep at the bottom of the file)
// create - Show form to create new listing
// store - Store new listing in database
// edit - Show form to edit listing
// update - Update listing in database
// destroy - Delete listing in database

// Authentication Routes:
// create - Show form to register new user
// store - Store new user in database

// WORKFLOW
// create route
// create controller file
// create controller methods/functions
// create view file


// All Listings
// Goes to ListingController.php and the index method loads the view
// Route to the method that loads the view
Route::get('/', [ListingController::class, 'index']);

// Show Create Form
Route::get('/listings/create', [ListingController::class, 'create']);

// Store Create Data
// submit form data to this route & call the store method
Route::post('/listings', [ListingController::class, 'store']);

// Show Edit Form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);

// Edit Update Listing
Route::put('/listings/{listing}', [ListingController::class, 'update']);

// Delete Listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy']);

// Show Register/Create Form
Route::get('/register', [UserController::class, 'create']);

// Create/Store New User
Route::post('/users', [UserController::class, 'store']);




// Single Listing (keep at the bottom of the file) - {listing} uses route model binding to get the ID
Route::get('/listings/{listing}', [ListingController::class, 'show']);
