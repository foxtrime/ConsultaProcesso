@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Cadastrar Processo</div>

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
                            <label for="data">Data da Vistoria</label>
                            <input id="data" name="data" type="text" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="nome_contribuinte">Hora da Vistoria</label>
                            <select name="hora" class="form-control" name="select">
                                <option value="Manhã - 09:00 as 12:00 Horas">Manhã - 09:00 as 12:00 Horas</option> 
                                <option value="Tarde - 12:00 as 17:00 Horas">Tarde - 12:00 as 17:00 Horas</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="presencial">Presencial</label>
                            <select name="presencial" class="form-control" name="select">
                                <option value="Sim">Sim</option> 
                                <option value="Não">Não</option>
                            </select>
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
@include('layouts.footer');
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript">
    $("#data").mask("00/00/0000");
    $("#cpf").mask("000.000.000-00");
 </script>
    <script>
        function goBack() {
          window.history.back();
        }
    </script>