@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Editar Oportunidade</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <form action="{{route('oportunidades.update', $oportunidade['id'])}}" method="post">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nome">Nome</label>
                                    <input type="text" class="form-control" id="nome" name="nome" value="{{$oportunidade['nome']}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="descricao">Descrição</label>
                                    <textarea class="form-control" name="descricao" id="descricao" cols="30" rows="5" required>{{$oportunidade['descricao']}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="status_id">Status</label>
                                    <select class="select2" data-minimum-results-for-search="Infinity" name="status_id" id="status_id" data-placeholder="Selecionar o status..." style="width: 100%;" required>
                                        <option value="1" {{$oportunidade['status_id'] == 1 ? 'selected' : ''}}>Novo</option>
                                        <option value="2" {{$oportunidade['status_id'] == 2 ? 'selected' : ''}}>Aprovado</option>
                                        <option value="3" {{$oportunidade['status_id'] == 3 ? 'selected' : ''}}>Recusado</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="clientes">Clientes</label>
                                    <select class="select2" multiple="multiple" name="clientes[]" id="clientes" data-placeholder="Selecionar clientes..." style="width: 100%;" required>
                                    @foreach ($clientes as $cliente)
                                        <option value="{{$cliente['id']}}">{{$cliente['name']}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <input type="hidden" value="{!! json_encode($oportunidade['clientes']) !!}" id="clientes-ids">
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Atualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $( document ).ready(function() {
            $('.select2').select2();

            $('.select2bs4').select2({
                theme: 'bootstrap4'
            });

            $('#clientes').val(JSON.parse($("#clientes-ids").val())).trigger('change');
        });
    </script>
@endsection
