<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateUserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_user_can_register()
    {
        // Prepare user data (like the registration form data)
        $userData = [
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ];

        // Simulate POST request to registration route
        $response = $this->post('/register', $userData);

        // Assert the user was redirected (or whatever your app does on success)
        $response->assertStatus(302);
        $response->assertRedirect('/home'); // Adjust if different

        // Assert user exists in the database
        $this->assertDatabaseHas('users', [
            'email' => 'testuser@example.com',
        ]);
    }
}
