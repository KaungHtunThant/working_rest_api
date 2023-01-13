<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Employees;

class ExampleTest extends TestCase
{
    use RefreshDatabase;
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
        $response = $this->get('/api/employees');

        $response->assertStatus(200);
    }

    public function test_if_employees_view_Detail_return_200(){
        $response = $this->post('/api/employees/add?empID=3&empName=Eugene&empAge=20');
        $employee = Employees::first();
        $response = $this->get('/api/employees/'.$employee->id);

        $response->assertStatus(200);
    }

    public function test_if_employees_add_return_200(){
        $response = $this->post('/api/employees/add?empID=3&empName=Eugene&empAge=20');

        $response->assertStatus(200);
        $this->assertCount(1, Employees::all());
    }

    public function test_if_employees_update_return_200(){
        $response = $this->post('/api/employees/add?empID=3&empName=Eugene&empAge=20');
        $employee = Employees::first();
        $response = $this->patch('/api/employees/update/'.$employee->id.'?empID=4&empName=John&empAge=18');

        $response->assertStatus(200);
    }

    public function test_if_employees_delete_return_200(){
        $response = $this->post('/api/employees/add?empID=4&empName=Eugene&empAge=20');
        $employee = Employees::first();
        $response = $this->delete('/api/employees/delete/'.$employee->id);

        $response->assertStatus(200);
    }
}
