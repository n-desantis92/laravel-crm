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
        <div id="ass" class="content-employees">
            <div class="filter">
                <input type="text"  @keyup.13="allemployee" v-model="ricerca" placeholder="Cerca...">
                <select v-on:change="allemployee" v-model="city">
                    <option value="">city</option>
                    @foreach ($city as $item)
                        <option value="{{$item}}">{{$item}}</option>
                    @endforeach
                </select>
            </div>
            <table class="table table-striped table-bordered table-bost" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Last name</th>
                        <th>E-mail</th>
                        <th>Phone</th>
                        <th>city</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(associato , i) in associati">
                        <td>@{{associato.name_emp}}</td>
                        <td>@{{associato.last_name}}</td>
                        <td>@{{associato.email_emp}}</td>
                        <td>@{{associato.phone_emp}}</td>
                        <td>@{{associato.city_emp}}</td>
                    </tr>
                </tbody>
            </table>
            <div class="page">

            </div>
        </div>
    </div>


<script>

    var app = new Vue({
        el: '#ass',
        data: {
            agency: {{$agency->id}},
            city: '',
            page: 0,
            ricerca: '',
            associati: [],
        },
        mounted() {
            this.allemployee();
            console.log(this.ricerca);

        },
        methods: {
            allemployee() {

                let serchquery = this.ricerca;
                let sercity = this.city;
                console.log(serchquery);
                console.log(sercity);

                axios.get('/api/employee-all' , {
                    
                    params: {
                        id: this.agency,
                        page: this.page,
                        city: sercity,
                        ricerca: serchquery,
                    }
                })
                .then((response) => {
                    this.associati = response.data;
                    console.log(response.data);
                })
                console.log(this.associati);
            }
        },

    })
</script>
@endsection