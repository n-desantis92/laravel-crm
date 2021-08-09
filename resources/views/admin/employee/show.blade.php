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
                    <a href="{{route('employee.create')}}">Dipendenti</a>
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
        <h2>Dipendenti</h2>

        <div class="content-page">
            <ul class="list-page">
                <span>Page :</span>

            </ul>
        </div>
    </div>
    
@endsection

