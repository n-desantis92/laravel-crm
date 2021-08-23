<?php

namespace App\Http\Controllers\Api;

use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class EmployeeController extends Controller
{
    
    public function employeeAll(Request $request)
    {
        $employees = Employee::all()->where('agency_id', $request->id);
        return response()->json($employees);

    }

}
