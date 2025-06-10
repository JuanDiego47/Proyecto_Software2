<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_creation(): void
    {
        // $this->seed();
        $request = [
            'name' => 'John',
            'email' => 'john@test.com',
            'password' => 'secret123', // usually hashed inside controller
            'phone' => '45454545454545',
            'accountType' => 'Administrator',
        ];
        $response = $this->post('/users/register', $request);
        $response->assertRedirect('/projects');

    }
    public function test_user_login(): void
    {

        $request = [
    
            'email' => 'john@hhghg.com',
            'password' => 'secret123', // usually hashed inside controller
           
        ];
        $response = $this->post('/users/login', $request);
        $response->assertRedirect('/projects');

    }
    public function test_user_logout(): void
    {
        $response = $this->get('/users/logout');
        $response->assertRedirect('/');

    }
}
