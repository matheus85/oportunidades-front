@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Cadastrar Oportunidade</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <form action="{{route('oportunidades.store')}}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nome">Nome</label>
                                    <input type="text" class="form-control" id="nome" name="nome" required>
                                </div>
                                <div class="form-group">
                                    <label for="descricao">Descrição</label>
                                    <textarea class="form-control" name="descricao" id="descricao" cols="30" rows="5" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="clientes">Clientes</label>
                                    <select class="select2" multiple="multiple" name="clientes[]" id="clientes" data-placeholder="Selecionar clientes..." style="width: 100%;" required>
                                    @foreach ($clientes as $cliente)
                                        <option value="{{$cliente['id']}}">{{$cliente['name']}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
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
        });
    </script>
@endsection
