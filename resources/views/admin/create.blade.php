@extends('layouts.base')

@section('page_title')
    aggiungi azienda
@endsection

@section('content')
    <div class="container-form">
        <h2>inserisci la nuova azienda</h2>
        <div class="form">
            <form class="mt-3" action="{{route('admin.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="form-group">
                    <label for="name_agency">Nome Azienda</label>
                    <input type="text" class="form-control" id="name_agency" name="name_agency" value="{{old('name_agency')}}" placeholder="Inserisci il nome dell 'azienda" required>
                </div>
                <div class="form-group">
                    <label for="email-agency">Email</label>
                    <input type="email" class="form-control" id="email_agency" name="email_agency" value="{{old('email_agency')}}" placeholder="Inserisci l'email" required>
                </div>
                <div class="form-group">
                    <label for="address_agency">indirizzo</label>
                    <input type="text"class="form-control"  name="address_agency" id="address_agency" value="{{old('address_agency')}}" placeholder="Inserisci l'indirizzo" required>
                </div>
                <div class="form-group">
                    <label for="city_agency">Città</label>
                    <input type="text"class="form-control"  name="city_agency" id="city_agency" value="{{old('city_agency')}}" placeholder="Inserisci l'indirizzo" required>
                </div>
                <div class="form-group">
                    <label for="p_iva">partita IVA</label>
                    <input type="text" class="form-control"  name="p_iva" id="p_iva" value="{{old('p_iva')}}" placeholder="Inserisci la partita IVA" required>
                </div>
                <div class="form-group">
                    <label for="phone_agency">numero di telefono</label>
                    <input type="text" class="form-control"  name="phone_agency" id="phone_agency" value="{{old('phone_agency')}}" placeholder="Inserisci il numero" required>
                </div>
                <div class="form-group">
                    <label for="logo">logo</label>
                    <input type="file" class="d-block" id="logo" name="logo" value="{{old('logo')}}">
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Aggiungi azienda</button>
                </div>
            </form>
        </div>
    </div>
@endsection