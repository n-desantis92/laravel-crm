<?php

namespace App\Http\Controllers;

use App\Agency;
use Illuminate\Http\Request;
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
        $agencies = Agency::all();
        $employees = Employee::paginate(10);
        return view('admin.employee.show', compact('employees', 'agencies'));
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
        $data['name_emp'] = ucfirst($data['name_emp']);
        $data['city_emp'] = ucfirst($data['city_emp']);

        //controllo se è stata inserita un'img o altrimenti metto un default
        if (isset($data['photo_emp'])) {
            $data['photo_emp'] = Storage::disk('public')->put('images', $data['photo_emp']);
        } else {
            $data['photo_emp'] = 'images/default.jpg';
        }

        $employeeNew  = Employee::create($data);
        return redirect()->route('index.employee')->with('message', 'il dipendente è stato aggiunto con successo!');
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
    public function edit(Employee $employee)
    {
        $agencies = Agency::all();
        return view('admin.employee.edit', compact('employee','agencies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        
        //prendo la validazione dei dati in entrata
        $validation = $this->validation;

        //faccio la validazione della $request
        $request->validate($validation);

        //salvo tutti i dati in una variabile una volta controllati
        $data = $request->all();
        $data['name_emp'] = ucfirst($data['name_emp']);
        $data['city_emp'] = ucfirst($data['city_emp']);

        //costruisco il percorso per inserire correttamente l'img
        if (isset($data['photo_emp'])) {
            $data['photo_emp'] = Storage::disk('public')->put('images', $data['photo_emp']);
        } else {
            $data['photo_emp'] = $employee['photo_emp'];
        }


        //salvo l'employee
        $employee->update($data);

        return redirect()->route('index.employee')->with('message', 'la modifica è avvenuta con successo!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('index.employee')->with('message', 'il dipendente è stato eliminato con successo!');
    }
}
