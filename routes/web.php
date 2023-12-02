<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;

// here we load all our views or controllers
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
// etc....

// create, edit & delete are protected routes for guest users, only authenticated users can see those pages.
// we can use the middleware() methods to protect those routes
// ->middleware('auth');
// ->middleware('guest');
// Authenticate.php middleware file has a redirectTo() method that redirects guest users to the login page, but we need to name the login route first.
// ->name('login');

// register & login are protected routes for authenticated users, only guest users can see those pages.
// RouteServiceProvider.php file has a HOME constant that redirects authenticated users to the home page, public const HOME = '/home';.
// Change this to public const HOME = '/';. The path to your application's "home" route.

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
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

// Store Create Data
// submit form data to this route & call the store method
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

// Show Edit Form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// Edit Update Listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

// Delete Listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

// Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

// Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create/Store New User
Route::post('/users', [UserController::class, 'store']);

// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Login/Authenticate User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// Single Listing (keep at the bottom of the file) - {listing} uses route model binding to get the ID
// (404 not found: Route Model Binding) error handling
Route::get('/listings/{listing}', [ListingController::class, 'show']);
