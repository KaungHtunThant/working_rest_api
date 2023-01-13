<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;

class EmployeesController extends Controller
{
    public function store(Request $request){
        $empID = $request->input('empID');
        $empName = $request->input('empName');
        $empAge = $request->input('empAge');

        $data = array(
            'empID' => $empID, 
            'empName' => $empName,
            'empAge' => $empAge
        );

        $result = Employees::create($data);
        if ($result){
            return response()->json([
                'type' => 'Employees',
                'message' => 'Success',
                'empID' => $result->empID,
                'attributes' => $result
            ], 201);
        }
        else{
            return response()->json([
                'type' => 'Employees',
                'message' => 'Fail',
                'attributes' => $result
            ], 400);
        }
    }

    public function show(){
        $result = Employees::get();

        return response()->json([
            'data' => $result
        ], 200);
    }
}
