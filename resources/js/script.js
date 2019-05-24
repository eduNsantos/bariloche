
require('./bootstrap');
require('datatables.net-dt');

window.swal = require('sweetalert')
window.Vue = require('vue');

$(document).ready(function() {
    $('#table').DataTable({
        "paging": false,
        'scrollY': '400px',
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
$('#table_wrapper').ready(function() {
    setTimeout(function() {
        let firstDiv = $('#table_wrapper').find('.row').first().find('div').first();
        $(firstDiv).addClass('d-flex justify-items-center align-items-center')
        $(firstDiv).append('Ultima nota: 12/04/2019 Nº 56');
    }, 1000);
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
    $('tr').removeClass('red-bari');
    $(this).parents('tr').addClass('red-bari')
    let nota = $(this).parents('tr').find('.nota').text()
    alertify.message(`${name} da nota <b>${nota}</b> copiada para área de transferência!`)
});

