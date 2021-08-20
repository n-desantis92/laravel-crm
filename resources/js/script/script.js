
var app = new Vue({
    el: '#app',
    data: {
        counter: 1,
        agency: 1,
        associati: [
            {
                nome: 'nino',
                cognome: 'pino'
            },
            {
                nome: 'anna',
                cognome: 'frank'
            }
        ],
    },
    mounted() {
        allEmployee(this.agency);
    },
    methods: {
        allEmployee(agency) {

            let associati = this.associati;
            axios.get('/api/employee' + agency , {
                
                params: {
                    id: agency
                }
            })
            .then((response) => {
                console.log(response.data);
                associati = response.data;
                return console.log(associati)
            });
        }
    },

})
