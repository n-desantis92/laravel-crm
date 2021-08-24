@extends('layouts.base')
@section('page_title')
    home-crm
@endsection
@section('header')
    @extends('layouts.header')
@endsection
@section('content')
    <div class="content-agency">
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
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
                        <a href="{{route('agency.show', ['agency' => $agency->id ])}}"><i class="fas fa-user-tie"></i></a>
                        <a href="{{route('agency.edit', ['agency' => $agency->id ])}}"><i class="far fa-edit"></i></a>
                        <form action="{{route('agency.destroy', ['agency' => $agency->id ])}}" method="POST" onsubmit="return confirm('Sei sicuro di voler eliminare l\'azienda?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delet"><i class="far fa-trash-alt"></i></button>
                        </form>
                    </div>                

                </li>
            @endforeach
        </ul>
        <div class="content-page">
            {{$agencies->links()}}
        </div>
        @if (session('danger'))
        <div class="alert alert-danger-my">
            <button v-on:click="close"><i class="far fa-times-circle"></i></button>
            {{ session('danger') }}
        </div>
        @endif
        @if (session('success'))
        <div  class="alert alert-success">
            <i class="far fa-times-circle"></i>
            {{ session('success') }}
        </div>
        @endif
    </div>
    
@endsection

