<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProjectTest extends TestCase
{
    use RefreshDatabase;

    public function test_project_creation(): void
    {
        $this->withoutMiddleware(
            \App\Http\Middleware\VerifyCsrfToken::class
        );
        $request = [
            'project_name' => 'test_project',
            'description' => 'test_description',
            'budget' => '4',
            'start_date' => '2004-4-4',
            'end_date' => '2004-4-4',
            'overall_sustainability_score' => '3.4',
        ];
        //dd($request);
        $response = $this->post('/projects', $request);
        $response->assertStatus(200);

    }
    public function test_project_update(): void
    {   
        $this->withoutMiddleware(
            \App\Http\Middleware\VerifyCsrfToken::class
        );
        $this->seed();
        $request = [
            'id' => '11',
            'project_name' => 'new_test_project',
            'description' => 'new_test_description',
            'budget' => '4',
            'start_date' => '2004-4-4',
            'end_date' => '2004-4-4',
            'overall_sustainability_score' => '3.4',
        ];
        // dd($request);
        $response = $this->patch('/projects', $request);
        $response->assertStatus(301);

    }
    public function test_project_index(): void
    {   
        $response = $this->get('/projects');
        $response->assertStatus(200);

    }
    public function test_project_show(): void
    {
        $this->seed();
        $id = '19';
        $response = $this->get('/projects/'.$id);
        $response->assertStatus(200);

    }
    public function test_project_elimination(): void
    {
        $this->seed();
        $id = 11;

        $response = $this->delete('/projects/{$id}');
        
        $this->assertDatabaseMissing('projects', ['id' => $id]);

    }
}
