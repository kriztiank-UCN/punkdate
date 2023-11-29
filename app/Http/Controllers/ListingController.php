<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    // show all listings
    public function index()
    {   
        // dd(request());
        return view('listings.index', [
            // sort, filter & search functionality is in the Listing.php model
            'listings' => Listing::latest()->filter(Request(['tag', 'search']))->get()
        ]);
    }

    // Show single listing
    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }
}
