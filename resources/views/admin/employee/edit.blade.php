@extends('layouts.base')

@section('page_title')
    modifica {{$employee->name_emp}}
@endsection

@section('header')
    @extends('layouts.header')
@endsection

@section('content')
<div class="container-form">
    <h2>modifica {{$employee->name_emp}}</h2>
    <div class="form">
        <form class="mt-3" action="{{route('employee.update', ['employee' => $employee->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <div class="form-group">
                    <label for="name_emp">Nome</label>
                    <input type="text" class="form-control" id="name_emp" name="name_emp" value="{{$employee->name_emp}}" required>
                </div>
                <div class="form-group">
                    <label for="last_name">Cognome</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{$employee->last_name}}" required>
                </div>
                <div class="form-group">
                    <label for="email-emp">Email</label>
                    <input type="email" class="form-control" id="email_emp" name="email_emp" value="{{$employee->email_emp}}" required>
                </div>
                <div class="form-group">
                    <label for="agency_id">Azienda</label>
                    <select name="agency_id" id="agency_id">
                        <option value="">seleziona azienda</option>
                        @foreach ($agencies as $agency)
                            @if ($agency->id == $employee->agency_id)
                                <option value="{{$agency->id}}" selected>{{$agency->name_agency}}</option>
                            @endif
                            <option value="{{$agency->id}}">{{$agency->name_agency}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="address_emp">indirizzo</label>
                    <input type="text"class="form-control"  name="address_emp" id="address_emp" value="{{$employee->address_emp}}" required>
                </div>
                <div class="form-group">
                    <label for="city_emp">Città</label>
                    <input type="text"class="form-control"  name="city_emp" id="city_emp" value="{{$employee->city_emp}}" required>
                </div>
                <div class="form-group">
                    <label for="phone_emp">numero di telefono</label>
                    <input type="text" class="form-control"  name="phone_emp" id="phone_emp" value="{{$employee->phone_emp}}" required>
                </div>
                <div class="form-group">
                    <label for="photo_emp">foto</label>
                    <img src="{{asset('storage/' . $employee->photo_emp)}}" alt="foto profilo">
                    <input type="file" class="d-block" id="photo_emp" name="photo_emp" value="{{$employee->photo_emp}}">
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">modifica dipendente</button>
                </div>
            </form>
        </div>
    </div>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
@endsection