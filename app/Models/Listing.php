<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    //  protected $fillable = ['name', 'location', 'email', 'description', 'tags'];

    public function scopeFilter($query, array $filters)
    {
        // dd($filters['tag']);

        // if this is not false move on to the next line
        // The Null coalescing operator https://www.tutorialspoint.com/php7/php7_coalescing_operator.htm
        if ($filters['tag'] ?? false) {
            // SQL like operator: https://www.w3schools.com/sql/sql_like.asp
            // serch for the tag in the tags column
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }

        // if ($filters['search'] ?? false) {
        //     $query->where('title', 'like', '%' . request('search') . '%')
        //         ->orWhere('description', 'like', '%' . request('search') . '%')
        //         ->orWhere('tags', 'like', '%' . request('search') . '%')
        //         ->orWhere('location', 'like', '%' . request('search') . '%');
        // }
    }

}
