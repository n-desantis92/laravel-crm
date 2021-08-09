<?php

namespace App\Http\Controllers;

use App\Agency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Employee;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    //VALIDATION
    protected $validation = [
        'name_emp' => 'required|string|max:50',
        'last_name' => 'required|string|max:50',
        'email_emp' => 'required|string|max:50',
        'photo_emp' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4000',
        'address_emp' => 'required|string|max:50',
        'phone_emp' => 'required|string',
        'city_emp' => 'required|string|max:50',
        'agency_id' => 'required|numeric|'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = DB::table('employees')->paginate(10);
        return view('admin.employee.show', compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agencies = Agency::all();
        return view('admin.employee.create', compact('agencies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validazione in entrata
        $validation = $this->validation;
        $request->validate($validation);

        $data = $request->all();


        if (isset($data['photo_emp'])) {
            $data['photo_emp'] = Storage::disk('public')->put('images', $data['photo_emp']);
        }
        $employeeNew  = Employee::create($data);
        $employeeNew->save();

        return redirect()->route('index.employee');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
