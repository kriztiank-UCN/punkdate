<?php

// data is coming from the Model
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;

// here we load all are views or controllers
// listings, posts, profiles, etc could be the name of the resource

// Common Resource Routes:
// index - Show all listings - page
// show - Show single listing - page
// create - Show form to create new listing on create - page
// store - Store new listing (post data)
// edit - Show form to edit listing 
// update - Update listing
// destroy - Delete listing  

// All Listings
// Goes to ListingController.php and the index method loads the view
// Route to the method that loads the view
Route::get('/', [ListingController::class, 'index']);

// Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);



