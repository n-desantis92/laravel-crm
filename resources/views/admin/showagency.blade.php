@extends('layouts.base')

@section('page_title')
    {{$agency->name_agency}}
@endsection

@section('header')
    @extends('layouts.header')
@endsection

@section('content')
    <div class="container-form">
        <h2>{{$agency->name_agency}}</h2>
        <div class="form">
            <div class="azienda">
                <div>
                    <h3 class="nome-dipendente">{{$agency->name_agency}}</h3>
                    <img class="foto" src="{{asset('storage/' . $agency->logo)}}" alt="foto dipendente">
                </div>
                <div class="dati">
                    <p><span>Email:</span> {{$agency->email_agency}}</p>
                    <p><span>Telefono:</span> {{$agency->phone_agency}}</p>
                    <p><span>Città:</span> {{$agency->city_agency}}</p>
                    <p><span>Indirizzo:</span> {{$agency->address_agency}}</p>
                </div>
                            
            </div>
        </div>
        <div class="content-employees">
            dipendenti
        </div>
    </div>
@endsection