var url_app = 'http://localhost/';
var url_api = 'http://localhost:9090/api/';
var table_api = '';
var param_api = '';
var dtTable;
var id_selected = 0;
var dtColumns = [];

$(document).ready(function($){
    $('.phone').mask('(00) 0000-0000', {clearIfNotMatch: true});
    $('.money').mask("000.00", {reverse: true});
});

$(document).ready(function(){
    cfgDtTable();

    refreshDtTable();

    $('#btnNew').click(function () {
        refreshFrm();
        $('#mdEditTitle').html("New");
        $('#mdEdit').modal('show');
    });

    $('#btnEdit').click(function () {
        if(id_selected > 0) {
            $.getJSON(url_api+table_api+id_selected, function (data) {
                console.log(data);
                $.each(data, function(key, item) {
                    $('#'+key).val(item);
                });
                $('#mdEditTitle').html("Edit");
                $('#mdEdit').modal('show');
            });
        }
    });

    $('#btnCopy').click(function () {
        if(id_selected > 0) {
            $.getJSON(url_api+table_api+id_selected, function (data) {
                refreshFrm();
                $.each(data, function(key, item) {
                    if(key != "id") {
                        $('#' + key).val(item);
                    }
                });
                $('#mdEditTitle').html("Copy");
                $('#mdEdit').modal('show');
            });
        }
    });

    $('#btnDelete').click(function () {
        if (id_selected > 0) {
            $('#txtDeleteId').html(id_selected);
            $('#mdDelete').modal('show');
        }
    });

    $('#btnDeleteConfirm').click(function () {
        if (id_selected > 0) {
            $.ajax({
                url: url_api+table_api+id_selected,
                type: 'DELETE',
            }).done(function () {
                refreshDtTable();
                refreshFrm();
                $('#mdEdit').modal('hide');
                $('#mdInfoBody').html("O registro foi excluído com sucesso.");
                $('#mdInfo').modal('show');
            }).fail(function (data) {
                console.log(data);
                $('#mdErrorBody').html(JSON.stringify(data));
                $('#mdError').modal('show');
            });
        }
    });

    $('#formData').submit(function (event) {
        event.preventDefault();
        if (id_selected > 0) {
            $.ajax({
                url: url_api+table_api+id_selected,
                type: 'PUT',
                data: $("#formData").serialize(),
            }).done(function (data) {
                refreshDtTable();
                refreshFrm();
                $('#mdEdit').modal('hide');
                $('#mdInfoBody').html("Registro atualizado com sucesso.");
                $('#mdInfo').modal('show');
            }).fail(function (data) {
                console.log(data);
                $('#mdErrorBody').html(JSON.stringify(data));
                $('#mdError').modal('show');
            });
        } else {
            $.post(url_api+table_api, $("#formData").serialize(), function (data) {
                refreshDtTable();
                refreshFrm();
                $('#mdEdit').modal('hide');
                $('#mdInfoBody').html("Registro gravado com sucesso.");
                $('#mdInfo').modal('show');
                if(typeof aux_insertForm === 'function') {
                    aux_insertForm(data);
                }
            }).fail(function (data) {
                console.log(data);
                $('#mdErrorBody').html(JSON.stringify(data));
                $('#mdError').modal('show');
            });
        }
    });
});

function cfgDtTable () {
    dtTable = $('#tblData').DataTable({
        columns: dtColumns,
        language: { "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json" }
    });

    $('#tblData tbody').on( 'click', 'tr', function () {
        var data_row = dtTable.row(this).data();
        id_selected = data_row["id"];
        $('#tblData tbody tr').removeClass('datatable-row_selected');
        $(this).addClass('datatable-row_selected');
        $('#btnEdit,#btnCopy,#btnDelete').removeAttr('disabled');
    });
}

function refreshDtTable() {
    $('#tblData').dataTable().fnClearTable();
    $.getJSON(url_api+table_api+param_api, function (data) {
        dtTable.rows.add(data).draw();
    });
}

function refreshFrm() {
    id_selected = 0;
    $('#formData')[0].reset();
    $('#btnEdit,#btnCopy,#btnDelete').attr('disabled', true);
    $('#tblData tbody tr').removeClass('datatable-row_selected');
}
