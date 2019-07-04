
require('./bootstrap');
require('datatables.net-dt');

window.swal = require('sweetalert')
window.Vue = require('vue');

Vue.component('vc-list', require('./components/List.vue').default);

$(document).ready(function() {
    alertify.defaults.maintainFocus = false;
    $('#table').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json",
            "decimal": ","
        },
        "columns": [
            null,
            null,
            { type: "date-eu" },
            null,
            null,
            null
        ]
    })
});

const app = new Vue({
    el: '#app',
    methods: {
        createFolders: function() {
            let item = document.getElementById('criar-pastas')
            axios.post(item.getAttribute('route'))
            .then(function(response) {
                let pastas = response.data.pastas
                var swalButtons = false

                if (response.data.status == 0) {
                    var swalIcon = 'error'
                } else if (response.data.status == 2) {
                    var swalIcon = 'warning'
                    var swalButtons = {
                        cancel: "Ignorar",
                        verPastas: {
                            text: 'Ver pastas',
                            value: 'verPastas'
                        },
                    }

                } else if (response.data.status == 1) {
                    var swalIcon = 'success'
                }

                swal({
                    text: response.data.message,
                    icon: swalIcon,
                    buttons: swalButtons
                })
                .then((value) => {
                    switch (value) {
                        case 'verPastas':
                            swal({
                                title: 'Pastas já criadas',
                                text: pastas.join(', ')
                            })
                            break
                    }
                })
            })
        }
    }
});


$(document).on('click','td[enable-copy*=true]', function() {
    $(this).CopyToClipboard()
    let name = $(this).attr('name')
    $('tr').removeClass('bg-red-bariloche');
    $(this).parents('tr').addClass('bg-red-bariloche')
    let nota = $(this).parents('tr').find('.nota').text()
    alertify.message(`${name} da nota <b>${nota}</b> copiada para área de transferência!`)
});

