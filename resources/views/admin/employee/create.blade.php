@extends('layouts.base')

@section('page_title')
    aggiungi dipendente
@endsection

@section('content')
<div class="container-form">
    <h2>inserisci il nuovo dipendente</h2>
    <div class="form">
        <form class="mt-3" action="{{route('employee.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')
                <div class="form-group">
                    <label for="name_emp">Nome</label>
                    <input type="text" class="form-control" id="name_emp" name="name_emp" value="{{old('name_emp')}}" placeholder="Inserisci il nome" required>
                </div>
                <div class="form-group">
                    <label for="last_name">Cognome</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{old('last_name')}}" placeholder="Inserisci il cognome" required>
                </div>
                <div class="form-group">
                    <label for="email-emp">Email</label>
                    <input type="email" class="form-control" id="email_emp" name="email_emp" value="{{old('email_emp')}}" placeholder="Inserisci l'email" required>
                </div>
                <div class="form-group">
                    <label for="agency_id">Azienda</label>
                    <select name="agency_id" id="agency_id">
                        <option value="">seleziona azienda</option>
                        @foreach ($agencies as $agency)
                            <option value="{{$agency->id}}">{{$agency->name_agency}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="address_emp">indirizzo</label>
                    <input type="text"class="form-control"  name="address_emp" id="address_emp" value="{{old('address_emp')}}" placeholder="Inserisci l'indirizzo" required>
                </div>
                <div class="form-group">
                    <label for="city_emp">Città</label>
                    <input type="text"class="form-control"  name="city_emp" id="city_emp" value="{{old('city_emp')}}" placeholder="Inserisci l'indirizzo" required>
                </div>
                <div class="form-group">
                    <label for="phone_emp">numero di telefono</label>
                    <input type="text" class="form-control"  name="phone_emp" id="phone_emp" value="{{old('phone_emp')}}" placeholder="Inserisci il numero" required>
                </div>
                <div class="form-group">
                    <label for="photo_emp">foto</label>
                    <input type="file" class="d-block" id="photo_emp" name="photo_emp" value="{{old('photo_emp')}}">
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Aggiungi dipendente</button>
                </div>
            </form>
        </div>
    </div>
@endsection