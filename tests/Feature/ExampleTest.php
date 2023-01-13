<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_if_employees_view_return_200(){
        $response = $this->get('/api/employees/view');

        $response->assertStatus(200);
    }

    public function test_if_employees_add_return_201(){
        $response = $this->post('/api/employees/add?empID=3&empName=Eugene&empAge=20');

        $response->assertStatus(201);
    }
}
