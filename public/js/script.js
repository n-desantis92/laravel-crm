/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***************************************!*\
  !*** ./resources/js/script/script.js ***!
  \***************************************/
var app = new Vue({
  el: '#app',
  data: {
    counter: 1,
    agency: 1,
    associati: [{
      nome: 'nino',
      cognome: 'pino'
    }, {
      nome: 'anna',
      cognome: 'frank'
    }]
  },
  mounted: function mounted() {
    allEmployee(this.agency);
  },
  methods: {
    allEmployee: function allEmployee(agency) {
      var associati = this.associati;
      axios.get('/api/employee' + agency, {
        params: {
          id: agency
        }
      }).then(function (response) {
        console.log(response.data);
        associati = response.data;
        return console.log(associati);
      });
    }
  }
});
/******/ })()
;