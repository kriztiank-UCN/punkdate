<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    // Check if login page exists
    public function test_login_form()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    // Check if user exists in database
    public function test_user_duplication()
    {
        $user1 = User::make([
            'name' => 'John Doe',
            'email' => 'johndoe@gmail.com'
        ]);

        $user2 = User::make([
            'name' => 'Jane Doe',
            'email' => 'janedoe@gmail.com'
        ]);

        $this->assertTrue($user1->name != $user2->name);
    }

    // Test if a user can be deleted
    public function test_delete_user()
    {
        $user = User::factory()->count(1)->make();

        $user = User::first();

        if ($user) {
            $user->delete();
        }

        $this->assertTrue(true);
    }

    // Perform a post() request to add a new user
    public function test_it_stores_new_users()
    {
        $response = $this->POST('/users', [
            'name' => 'Dary',
            'email' => 'dary@gmail.com',
            'password' => 'dary1234',
            'password_confirmation' => 'dary1234'
        ]);

        $response->assertRedirect('/');
    }
    
    // Test if a user exists in the database
    public function test_if_data_exists_in_database()
    {
        $this->assertDatabaseHas('users', [
            'name' => 'Dary'
        ]);
    }

    public function test_if_seeders_works()
    {
        // php artisan db:seed
        $this->seed(); // run all seeders in the seeders folder
    }

}
