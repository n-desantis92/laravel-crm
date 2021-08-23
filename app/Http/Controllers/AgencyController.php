<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Agency;

class AgencyController extends Controller
{

    protected $validation = [
        'name_agency' => 'required|string|max:50',
        'email_agency' => 'required|string|max:50',
        'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4000',
        'p_iva' => 'required|string|min:11|max:11',
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
        $user = Auth::user();
        if ($user) {

            $agencies = Agency::paginate(10);
        
            return view('admin.home', compact('agencies'));
        }else if($user == false) {
            return view('auth.login');

        }
        else {
            echo ('<h1>devi registrarti</h1>');
            header( "refresh:2;url=/home" );
        }

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
        $data = $request->all();
        //trasformo la partita iva da stringa a numero
        if(is_string($data['p_iva'])){
            $data['p_iva'] = intval($data['p_iva']);
        }

        $validation = $this->validation;
        // validation
        $request->validate($validation);
        
        if (isset($data['logo'])) {
            $data['logo'] = Storage::disk('public')->put('images', $data['logo']);
        }else {
            $data['logo'] = 'images/default.jpeg';
        }
        $agencyNew  = Agency::create($data);

        return redirect()->route('admin.home');       

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Agency $agency)
    {
        return view('admin.showagency', compact('agency'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Agency $agency)
    {
        return view('admin.edit', ['agency' => $agency]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agency $agency)
    {

        $validation = $this->validation;

        $data = $request->all();

        if (isset($data['logo'])) {
            $data['logo'] = Storage::disk('public')->put('images', $data['logo']);
        }else {
            $data['logo'] = $agency['logo'];
        }

        $agency->update($data);

        return redirect()->route('admin.home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agency $agency)
    {
        $agency->delete();
        return redirect()->route('admin.home')->with('message', 'l\'azienda è stata eliminata con successo!');
    }
}
