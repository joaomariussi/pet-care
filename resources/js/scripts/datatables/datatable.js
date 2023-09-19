/**
 * datatable global
 *
 * @param args
 */
function datatable(args) {

    /**
     * @type {jQuery|HTMLElement}
     */
    let table = $(args.id)

    /**
     * Se a datatable existe ela é destruida e depois recriada-utilizado ao cadastrar nova linha
     */
    if ($.fn.DataTable.isDataTable(table)) {
        $(table).DataTable().destroy();
        $(table).DataTable().fnClearTable();
    }

    /**
     * Monta a datatable
     */
    table.DataTable({
        "lengthChange": true,
        "pagingType": "full_numbers",
        'pageLength': 10,
        'lengthMenu': [[10, 20, 25, 50, -1], [10, 20, 25, 50, 'All']],
        "responsive": false,
        "scrollX": true,
        "serverSide": false,
        "destroy": true,
        "data": args.data,
        "buttons": [
        ],
        "columns": args.columns,
        "language": {
            "paginate": {
                "previous": " < ",
                "next": " > ",
                "first": " Primeira ",
                "last": " Última "
            },
            "info": "Listando _START_ até _END_ de _TOTAL_ resultados",
            "infoFiltered": " - Filtrados de _MAX_ resultados",
            "infoEmpty": "Nenhum resultado encontrado.",
            "emptyTable": "Nenhum registro encontrado",
            "zeroRecords": "Nenhum registro encontrado",
            "lengthMenu": "Mostrar _MENU_ itens por página",
            "search": "Buscar:"
        },
    });

    /**
     * Recalcula a largura das colunas
     */
    $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust()
            .responsive.recalc();

    });
}
