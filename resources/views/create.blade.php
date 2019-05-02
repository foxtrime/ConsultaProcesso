@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ url('/home') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="processo">Numero do Processo</label>
                            <input type="number" class="form-control" name="processo" id="processo" style="width: 40%;" required>
                        </div>

                        <div class="form-group">
                            <label for="nome_contribuinte">Nome do Contribuinte</label>
                            <input type="text" class="form-control" name="nome_contribuinte" id="nome_contribuinte" style="width: 40%;" required>
                        </div>

                        <div class="form-group">
                                <label for="cpf">Cpf do Contribuinte</label>
                                <input type="text" class="form-control" name="cpf" id="cpf" style="width: 40%;" required>
                        </div>

                        <div class="form-group">
                            <label for="endereco_visita">Endereço da Vistoria</label>
                            <input type="text" class="form-control" name="endereco_visita" id="endereco_visita" style="width: 40%;" required>
                        </div>

                        <div class="form-group">
                            <label for="nome_contribuinte">Data da Vistoria</label>
                            <input id="data" name="data" type="date" class="form-control" value="" required>
                        </div>

                        <div class="form-group">
                            <label for="nome_contribuinte">Hora da Vistoria</label>
                            <input name="hora" type="time" class="form-control" required>
                        </div>

                        <div class="row col-md-12 col-sm-12">
                                <div>
                                    <button type="submit" id="enviar-relatorio" class="botoes-acao btn btn-round btn-success enviar-relatorio">
                                        <span class="icone-botoes-acao mdi mdi-send"></span>
                                        <span class="texto-botoes-acao"> ENVIAR </span>
                                        <div class="ripple-container"></div>
                                    </button>
            
                                    <button class="botoes-acao btn btn-round btn-primary" onclick="goBack()">
                                        <span class="icone-botoes-acao mdi mdi-backburger"></span>   
                                        <span class="texto-botoes-acao"> CANCELAR </span>
                                        <div class="ripple-container"></div>
                                    </button>
                                </div>
                            </div>            
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
    <script>
        function goBack() {
          window.history.back();
        }
    </script>