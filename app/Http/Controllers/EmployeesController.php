<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;

class EmployeesController extends Controller
{
    protected function validateRequest(){
        return request()->validate([
                'empID' => 'required',
                'empName' => 'required',
                'empAge' => 'required'
            ]);
    }

    public function store(){

        Employees::create($this->validateRequest());
    }

    public function show(){
        $result = Employees::get();

        return response()->json([
            'data' => $result
        ], 200);
    }

    public function showDetail(Employees $employee){

        return response()->json([
            'data' => $employee
        ], 200);
    }

    public function update(Employees $employee){

        $employee->update($this->validateRequest());
    }

    public function destroy(Employees $employee){

        $employee->delete();
    }
}
