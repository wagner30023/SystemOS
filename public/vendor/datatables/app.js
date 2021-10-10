// Call the dataTables jQuery plugin
$(document).ready(function () {

    const DATATABLE_PTBR = {
        "sEmptyTable": "Nenhum registro encontrado",
        "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
        "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
        "sInfoFiltered": "(Filtrados de _MAX_ registros)",
        "sInfoPostFix": "",
        "sInfoThousands": ".",
        "sLengthMenu": "_MENU_ resultados por página",
        "sLoadingRecords": "Carregando...",
        "sProcessing": "Processando...",
        "sZeroRecords": "Nenhum registro encontrado",
        "sSearch": "Pesquisar",
        "oPaginate": {
            "sNext": "Próximo",
            "sPrevious": "Anterior",
            "sFirst": "Primeiro",
            "sLast": "Último"
        },
        "oAria": {
            "sSortAscending": ": Ordenar colunas de forma ascendente",
            "sSortDescending": ": Ordenar colunas de forma descendente"
        },
        "select": {
            "rows": {
                "_": "Selecionado %d linhas",
                "0": "Nenhuma linha selecionada",
                "1": "Selecionado 1 linha"
            }
        }
    }


    $('.dataTable').DataTable({

        'oLanguage': DATATABLE_PTBR,
        responsive: true,
        'aoColumnDefs': [{
                'bSortable': false,
                'aTargets': ['no-sort']
            }]
    });

    $('.produtos').DataTable({

        'oLanguage': DATATABLE_PTBR,
        responsive: true,
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'pdfHtml5',
                text: '<i class="fas fa-download"></i>',
                title: 'Lista de produtos cadastrados',
                filename: 'Produtos cadastrados',
                titleAttr: 'Exportar para PDF',
                className: 'btn btn-primary btn-sm',
                orientation: 'portrait',
                pageSize: 'A4',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6, 7]
                }
            }
        ],
        'aoColumnDefs': [{
                'bSortable': false,
                'aTargets': ['no-sort']
            }],
    });

});