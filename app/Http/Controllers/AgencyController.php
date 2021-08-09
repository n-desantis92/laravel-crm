<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Agency;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;



class AgencyController extends Controller
{

    protected $validation = [
        'name_agency' => 'required|string|max:50',
        'email_agency' => 'required|string|max:50',
        'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4000',
        'p_iva' => 'required|numeric|min:11|max:11',
        'address_agency' => 'required|string|max:50',
        'phone_agency' => 'required|string',
        'city_agency' => 'required|string|max:50',

    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $agencies = DB::table('agencies')->paginate(10);
        
        return view('admin.home', compact('agencies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //VALIDATION
        $validation = $this->validation;

        
        $data = $request->all();
        if (isset($data['logo'])) {
            $data['logo'] = Storage::disk('public')->put('images', $data['logo']);
        }
        $agencyNew  = Agency::create($data);
        $agencyNew->save();

        return redirect()->route('admin.home');       

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
