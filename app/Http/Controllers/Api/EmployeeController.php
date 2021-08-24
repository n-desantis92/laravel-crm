<?php

namespace App\Http\Controllers\Api;

use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class EmployeeController extends Controller
{
    
    public function employeeAll(Request $request)
    {   
        $ricerca = $request->ricerca;
        $city = $request->city;

        if ( $ricerca == '' && $city == '') {
            $employees = Employee::paginate(10)
            ->where('agency_id', $request->id);
            
        
            return response()->json($employees);

        } else if ($ricerca == ''){
            $employees = Employee::paginate(10)
            ->where('agency_id', $request->id)
            ->where('city_emp', $city);

            return response()->json($employees);

        } else if ($city == ''){
            $employees = Employee::paginate(10)
            ->where('agency_id', $request->id)
            ->where('name_emp', 'LIKE', $ricerca);

            return response()->json($employees);

        } else {
            $employees = Employee::paginate(10)
            ->where('agency_id', $request->id)
            ->where('city_emp', $city)
            ->where('name_emp', 'LIKE', $ricerca);

            return response()->json($employees);
        }
        
    }

}
