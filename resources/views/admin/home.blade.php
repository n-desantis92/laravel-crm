@extends('layouts.base')
@section('page_title')
    home-crm
@endsection
@section('header')
    <div class="nav-bar">
        <nav>
            <ul class="menu">
                <li>
                    <a href="{{route('admin.home')}}">Aziende</a>
                </li>
                <li>
                    <a href="{{route('admin.home')}}">Dipendenti</a>
                </li>
            </ul>
        </nav>
        <div class="login">
            @if (Route::has('login'))
                <div class="login-link">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </div>
@endsection
@section('content')
    <div class="content-agency">
        <h2>Aziende</h2>
        <ul class="list-agency">
            <div class="insert">
                <a href="{{route('admin.create')}}"><i class="far fa-plus-square"></i></a>
            </div>

            @foreach ($agencies as $agency)

                <li class="azienda">
                    <div>
                        <h3 class="nome-azienda">{{$agency->name_agency}}</h3>
                        <img class="logo-azienda" src="{{asset('storage/' . $agency->logo)}}" alt="logo">
                    </div>
                    <div class="dati">
                        <p><span>Partita IVA:</span> {{$agency->p_iva}}</p>
                        <p><span>Email:</span> {{$agency->email_agency}}</p>
                        <p><span>Telefono:</span> {{$agency->phone_agency}}</p>
                        <p><span>Città:</span> {{$agency->city_agency}}</p>
                        <p><span>Indirizzo:</span> {{$agency->address_agency}}</p>
                    </div>
                    <div class="editing">
                        <a href="#"><i class="fas fa-user-tie"></i></a>
                        <a href="#"><i class="far fa-edit"></i></a>
                        <a href="#"><i class="far fa-trash-alt"></i></a>
                    </div>                
                </li>
            @endforeach
        </ul>
        <div class="content-page">
            <ul class="list-page">
                <span>Page :</span>

                @for ($i = 1; $i <= $agencies->lastPage(); $i++)
                    <li class="page">{{$i}}</li>
                @endfor
            </ul>
        </div>
    </div>
    
@endsection

