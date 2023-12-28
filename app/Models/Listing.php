<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    // protected $fillable = ['name', 'age', 'tags', 'location', 'email', 'description'];
    // or allow mass assignment in the AppServiceProvider.php
    
    public function scopeFilter($query, array $filters)
    {
        // dd($filters['tag']);

        // if tag is not false move on to the next line
        // The Null coalescing operator https://www.tutorialspoint.com/php7/php7_coalescing_operator.htm
        if ($filters['tag'] ?? false) {
            // SQL like operator: https://www.w3schools.com/sql/sql_like.asp
            // query the listings table with a where clause
            // search for the tag in the tags column
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }

        // if search is not false move on to the next line
        if ($filters['search'] ?? false) {
            // search for the search term in the name, age, tags, location and description columns
            $query->where('name', 'like', '%' . request('search') . '%')
                ->orWhere('age', 'like', '%' . request('search') . '%')
                ->orWhere('tags', 'like', '%' . request('search') . '%')
                ->orWhere('location', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%');
        }
    }

    // Relationship to user, a listing belongs to a user, 
    // a user can have many listings, define on the User model
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
