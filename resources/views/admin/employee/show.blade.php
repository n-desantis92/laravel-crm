
<
@extends('layouts.base')
@section('page_title')
    home-crm
@endsection

@section('header')
    @extends('layouts.header')
@endsection

@section('content')
    <div class="content-agency">
        <h2>Dipendenti</h2>
        <ul class="list-agency">
            <div class="insert">
                <a href="{{route('employee.create')}}"><i class="far fa-plus-square"></i></a>
            </div>

            @foreach ($employees as $employee)

                <li class="azienda">
                    <div>
                        <h3 class="nome-dipendente">{{$employee->name_emp}} {{$employee->last_name}}</h3>
                        <img class="foto" src="{{asset('storage/' . $employee->photo_emp)}}" alt="foto dipendente">
                    </div>
                    <div class="dati">
                        <p><span>Email:</span> {{$employee->email_emp}}</p>
                        <p><span>Telefono:</span> {{$employee->phone_emp}}</p>
                        <p><span>Città:</span> {{$employee->city_emp}}</p>
                        <p><span>Indirizzo:</span> {{$employee->address_emp}}</p>
                    </div>
                    <div class="editing">
                        <a href="{{route('agency.show', ['agency' => $employee->agency_id ])}}"><i class="far fa-building"></i></a>
                        <a href="{{route('employee.edit', ['employee' => $employee->id ])}}"><i class="far fa-edit"></i></a>
                        <form action="{{route('employee.destroy', ['employee' => $employee->id ])}}" method="POST" onsubmit="return confirm('Sei sicuro di voler eliminare il dipendente?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delet"><i class="far fa-trash-alt"></i></button>
                        </form>                    
                    </div>                
                </li>
            @endforeach
        </ul>
        <div class="content-page">
            <ul class="list-page">
                <span>Page :</span>

                @for ($i = 1; $i <= $employees->lastPage(); $i++)
                    <li class="page">{{$i}}</li>
                @endfor
            </ul>
        </div>
        @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
    

@endsection

