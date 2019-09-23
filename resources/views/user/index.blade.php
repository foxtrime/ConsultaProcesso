@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div style="padding-bottom: 20px;padding-top: 20px;">
                <center><label>Consulte</label>
                <input type="text" class="form-control" name="processo" id="processo" style="width: 40%;" required></center>
            </div>
                <div class="d-flex justify-content-center">
                    <button class='btn btn-success' id="procurar">Buscar</button>
                </div>        
            
            <div style="padding-top: 43px;">
                <table align="center" class="table">
                    <tr style="text-align:center" id="cpf"></tr>
                    <tr style="text-align:center" id="nome_contribuintes"></tr>
                    <tr style="text-align:center" id="endereco_visitas"></tr>
                    <tr style="text-align:center" id="datas"></tr>
                    <tr style="text-align:center" id="horas"></tr>
                    <tr style="text-align:center" id="statu"></tr>
                </table>
                    <center>
                        <div id="resp"></div>
                    </center> 
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-success" onclick="enviar()" id="enviar" style="display:none">Confirmar Visita</button> 
                    </div>                    
            </div>
        </div>
        <form hidden>
            <input type="text" id="numeroProcesso" name="numeroProcesso" >
        </form>
    </div>
</div>

<script>
    $(document).ready(function(){
        $("button#procurar").click(function(event) {
            event.preventDefault();
            $('#resp').html("");
            $('#processos').html("");
            $('#cpf').html("");
            $('#nome_contribuinte').html('');
            $('#endereco_visita').html('');
            $('#data').html('');
            $('#hora').html('');
            $('#status').html('');

            let numeroProcesso = document.getElementById("processo").value;
            
            var query = "http://consultaprocesso.test/pesquisaprocesso/" +numeroProcesso;
            //console.log(query);

            $.ajax({
                url: query,
                success: function(data){
                    var button = document.getElementById("procurar");
                    
                    procurar.addEventListener("click", function(){
                    
                    });

                    var dados = data;
                    console.log(dados);
                    
                    if(dados==0){
                        //esconde a div se ela existir
                        $('#processos').hide();
                        $('#cpf').hide();
                        $('#nome_contribuintes').hide();
                        $('#endereco_visitas').hide();
                        $('#datas').hide();
                        $('#horas').hide();
                        $('#statu').hide();
                        $('#enviar').hide();
                        //Mostra mensagem
                        $("#resp").html("<h3>Nenhum dado encontrado</h3>");
                    }else{
                        //Mostra a div
                        $('#processos').show();
                        $('#cpf').show();
                        $('#nome_contribuintes').show();
                        $('#endereco_visitas').show();
                        $('#datas').show();
                        $('#horas').show();
                        $('#statu').show();
                        $('#enviar').show();
                        if(dados[0]['status']=='Validado'){
                            $('#enviar').hide();
                        }
                        //Cria os dados
                        $('#processos').html("Processo: "+dados[0]['processo']);
                        $('#cpf').html("Cpf: "+dados[0]['cpf']);
                        $('#nome_contribuintes').html("Nome do Contribuinte: "+dados[0]['nome_contribuinte']);
                        $('#endereco_visitas').html("Endereço da Vistoria: "+dados[0]['endereco_visita']);
                        $('#datas').html("Data da Vistoria: "+dados[0]['data']);
                        $('#horas').html("Período da Vistoria : "+dados[0]['hora']);
                        $('#statu').html("Status do Contribuinte: "+dados[0]['status']);
                    }


                }
                        
            })
        })
    });

    function enviar(){
        let numeroProcesso = document.getElementById("processo").value;

        var query = "{{url("/")}}/validaprocesso/"+numeroProcesso;
    
         $.ajax({
             url: query,
             success: function(data){
                $('#statu').html('Validado');
                $('#enviar').hide();
             }
         })

    }

</script>
@include('layouts.footer')
@endsection