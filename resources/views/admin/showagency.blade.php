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
        </div>
    </div>


<script>

    var app = new Vue({
        el: '#ass',
        data: {
            agency: 1,
            associati: [],
        },
        mounted() {
            this.allemployee();

        },
        methods: {
            allemployee() {

                axios.get('/api/employee-all' , {
                    
                    params: {
                        id: this.agency
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