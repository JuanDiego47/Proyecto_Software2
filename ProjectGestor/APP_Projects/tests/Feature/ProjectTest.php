<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use RefreshDatabase;

    public function test_project_creation(): void
    {

        $request = [
            'project_name' => 'test_project',
            'description' => 'test_description',
            'budget' => '4',
            'start_date' => '2004-4-4',
            'end_date' => '2004-4-4',
            'overall_sustainability_score' => '3.4',
        ];
        // dd($request);
        $response = $this->post('/projects', $request);
        $response->assertStatus(200);

    }
}
