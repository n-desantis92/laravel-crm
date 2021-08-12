@extends('layouts.base')

@section('page_title')
    modifica {{$agency->name_agency}}
@endsection

@section('header')
    @extends('layouts.header')
@endsection

@section('content')
    <div class="container-form">
        <h2>Modifica: {{$agency->name_agency}}</h2>
        <div class="form">
            <form class="mt-3" action="{{route('agency.update', ['agency' => $agency->id ])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name_agency">Nome Azienda</label>
                    <input type="text" class="form-control" id="name_agency" name="name_agency" value="{{$agency->name_agency}}"required>
                </div>
                <div class="form-group">
                    <label for="email-agency">Email</label>
                    <input type="email" class="form-control" id="email_agency" name="email_agency" value="{{$agency->email_agency}}" required>
                </div>
                <div class="form-group">
                    <label for="address_agency">indirizzo</label>
                    <input type="text"class="form-control"  name="address_agency" id="address_agency" value="{{$agency->address_agency}}" required>
                </div>
                <div class="form-group">
                    <label for="city_agency">Città</label>
                    <input type="text"class="form-control"  name="city_agency" id="city_agency" value="{{$agency->city_agency}}" required>
                </div>
                <div class="form-group">
                    <label for="p_iva">partita IVA</label>
                    <input type="text" class="form-control"  name="p_iva" id="p_iva" value="{{$agency->p_iva}}" required>
                </div>
                <div class="form-group">
                    <label for="phone_agency">numero di telefono</label>
                    <input type="text" class="form-control"  name="phone_agency" id="phone_agency" value="{{$agency->phone_agency}}" required>
                </div>
                <div class="form-group">
                    <label for="logo">logo</label>
                    <img src="{{asset('storage/' . $agency->logo)}}" alt="logo azienda">
                    <input type="file" class="d-block" id="logo" name="logo">
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Modifica azienda</button>
                </div>
            </form>
        </div>
    </div>
@endsection