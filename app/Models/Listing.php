<?php
namespace App\Models;

class Listing {
  // All Listings
  public static function all() {
    return [
      ['id' => 1, 'title' => 'Listing 1', 'description' => 'lorem ipsum'],
      ['id' => 2, 'title' => 'Listing 2', 'description' => 'lorem ipsum'],
    ];
  }

  // fetch single listing
  public static function find($id) {
    $listings = self::all();

    foreach ($listings as $listing) {
      if ($listing['id'] == $id) {
        return $listing;
      }
    }
  }

}