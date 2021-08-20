<?php

namespace App\Http\Controllers\Api;

use App\Agency;
use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // public function getEmployee(Request $request)
    // {   
    //     $employees = Employee::all()->where('agency_id', $request->id);
    //     return response()->json($employees);
    // }
    
    public function employeeAll()
    {
        $employee = Employee::all();
        return response()->json($employee);
    }

    public function getEmployee()
    {
        $dato = 'ciao';
        return response()->json($dato);
    }
}
