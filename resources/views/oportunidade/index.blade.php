@extends('layouts.app')

@section('content')
<input type="hidden" name="url_oportunidades" value="{{ route('oportunidades.index') }}">

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Oportunidades cadastradas</h1>
            </div>
        </div>
    </div>
</div>

<div id="filtros" style="display: none;">
    <div class="form-group mb-0">
        <label class="form-check-inline" style="font-weight: normal;">Status&nbsp;&nbsp;
            <select name="status_filter" class="form-control form-control-sm" id="status_filter">
                <option value="0" selected>Todos</option>
                <option value="1">Novo</option>
                <option value="2">Aprovado</option>
                <option value="3">Recusado</option>
            </select>
        </label>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <table id="tabela" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>Status</th>
                                    <th>Data</th>
                                    <th>Vendedor</th>
                                    <th>Descrição</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        function delete_oportunidade(id) {
            event.preventDefault();
            let url = $("input[name^='url_oportunidades']").val() + '/' + id;

            $.confirm({
                type: 'red',
                title: 'Excluir',
                content: 'Excluir esta oportunidade?',
                icon: 'fas fa-question-circle',
                typeAnimated: true,
                escapeKey: true,
                backgroundDismiss: true,
                buttons: {
                    confirm: {
                        text: 'Sim',
                        btnClass: 'btn-danger',
                        action: function(){
                            $.ajax({
                                method: 'DELETE',
                                url: url,
                                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            }).done(function(data, statusText, xhr) {
                                let status = xhr.status;
                                if(status == 200) {
                                    toastr.success('Exclusão realizada com sucesso');
                                    $('#tabela').DataTable().ajax.reload();
                                }
                            }).fail(function(error) {
                                toastr.error('Tente novamente dentro de alguns instantes');
                            });
                        }
                    },
                    cancel: {
                        text: 'Não'
                    }
                }
            });
        }

        $("#tabela").DataTable({
            responsive: true,
            lengthChange: false,
            autoWidth: false,
            ajax: '/oportunidades-dt',
            beforeSend: function (request) {
                request.setRequestHeader("X-CSRF-TOKEN", $('meta[name="csrf-token"]').attr('content'));
            },
            buttons: ["excel", "pdf", "print"],
            columns: [
                { data: "id", class: "cell", render: function (data) {
                    return data ? data : "";
                }},
                { data: "nome", class: "cell", render: function (data) {
                    return data ? data : "";
                }},
                { data: "status_id", class: "cell", width: 90, render: function (data) {
                    let aprovado = '<span class="badge bg-success">Aprovado</span>';
                    let recusado = '<span class="badge bg-danger">Recusado</span>';
                    let novo = '<span class="badge bg-secondary">Novo</span>';
                    if(parseInt(data) == 1) {
                        return novo;
                    } else if(parseInt(data) == 2) {
                        return aprovado;
                    } else if(parseInt(data) == 3) {
                        return recusado;
                    } else {
                        return "";
                    }
                }},
                { data: "created_at", class: "cell", render: function (data) {
                    return data ? moment(data).format('DD/MM/YYYY HH:mm') : "";
                }},
                { data: "nome_vendedor", class: "cell", render: function (data) {
                    return data ? data : "";
                }},
                { data: "descricao", class: "cell", render: function (data) {
                    return data ? data : "";
                }},
                {data: "id", class: "text-center cell", orderable: false, width: 90, render: function (data) {
                    return '<a href="' + $("input[name^='url_oportunidades']").val() + '/' + data +'/edit"><i class="far fa-edit text-warning"></i></a> &nbsp; <a href="javascript: void(0);" onclick="delete_oportunidade(' + data + ');"><i class="far fa-trash-alt text-danger"></i></a>';
                }},
            ],
            initComplete: function( settings, json ) {
                $("#filtros").appendTo("#tabela_wrapper .col-md-6:eq(0)"),
                $("#filtros").show()
            },
        }).buttons().container().appendTo('#tabela_wrapper .col-md-6:eq(0)');

        var table = $('#tabela').DataTable();

        $("#status_filter").on("change", function() {
            console.log("^" + $("#status_filter option:selected").text() + "$");
            if($(this).val() == 0) {
                table.columns().column('2').search("").draw();
            } else {
                table.columns().column('2').search("^" + $("#status_filter option:selected").text() + "$", true, false, true).draw();
            }
        });
    </script>
@endsection
