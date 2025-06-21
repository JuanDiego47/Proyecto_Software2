<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function usuario_puede_registrarse()
    {
        $response = $this->postJson('/api/register', [
            'name' => 'Juan',
            'email' => 'juan@example.com',
            'password' => 'password123',
            'phone' => '3001234567',
            'accountType' => 'user'
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('users', ['email' => 'juan@example.com']);
    }

    /** @test */
    public function usuario_puede_iniciar_sesion()
    {
        // Crear usuario primero
        User::create([
            'name' => 'Juan',
            'email' => 'juan@example.com',
            'password' => bcrypt('password123'),
            'phone' => '3001234567',
            'accountType' => 'user'
        ]);

        $response = $this->postJson('/api/login', [
            'email' => 'juan@example.com',
            'password' => 'password123'
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure(['token']);
    }
}
