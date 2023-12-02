<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // creates 5 users + 2 listings with hard coded data
        // \App\Models\User::factory(5)->create();

        // create one user, then create 2 listings for that user
        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@email.com'
        ]);

        \App\Models\Listing::create(

            [
                // define the user_id as the user that was just created. link primay key to foreign key
                'user_id' => $user->id,
                'name' => 'name-user1',
                'age' => '26',
                'location' => 'Boston, MA',
                'email' => 'email1@email.com',
                'tags' => 'female, straight, 25-30',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
            ]
        );

        \App\Models\Listing::create(
            [
                'user_id' => $user->id,
                'name' => 'name-user2',
                'age' => '44',
                'location' => 'New York, NY',
                'email' => 'email2@email.com',
                'tags' => 'female, bi, 28-35',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
            ],
        );
    }
}
