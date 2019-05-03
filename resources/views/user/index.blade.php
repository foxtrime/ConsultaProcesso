@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div style="padding-bottom: 20px;padding-top: 20px;">
                <center><label>Consulte</label>
                <input type="text" class="form-control" name="processo" id="processo" style="width: 40%;" required></center>
            </div>
            
            <div class="row">
                <div style="padding-left: 47%;">
                    <button class='btn btn-success' id="procurar">Buscar</button>
                </div>
            </div>
            <div>
                <center>
                    <div id="resp" class='alert'></div>
                    {{-- <div id="processos" class='rounded'></div> --}}
                    <div id="cpf" class='rounded'></div>
                    <div id="nome_contribuintes" class='rounded'></div>
                    <div id="endereco_visitas" class='rounded'></div>        
                    <div id="datas" class='rounded'></div>
                    <div id="horas" class='rounded'></div>
                    <div id="statu" class='rounded'></div>
                    <button class="btn btn-success" onclick="enviar()" id="enviar" style="display:none">Confirmar Visita</button>
                </center>
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
                        $('#endereco_visistas').hide();
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
                        $('#endereco_visistas').show();
                        $('#datas').show();
                        $('#horas').show();
                        $('#statu').show();
                        $('#enviar').show();
                        //Cria os dados
                        $('#processos').html("Processo: "+dados[0]['processo']);
                        $('#cpf').html("Cpf: "+dados[0]['cpf']);
                        $('#nome_contribuintes').html("Nome do Contribuinte: "+dados[0]['nome_contribuinte']);
                        $('#endereco_visistas').html("Endereço da Vistoria: "+dados[0]['endereco_visita']);
                        $('#datas').html("Data da Vistoria: "+dados[0]['data']);
                        $('#horas').html("Hora da Vistoria: "+dados[0]['hora']);
                        $('#statu').html("Status do Contribuinte: "+dados[0]['status']);
                    }


                }
                        
            })
        })
    });

    function enviar(){
        let numeroProcesso = document.getElementById("processo").value;

        var query = "http://consultaprocesso.test/validaprocesso/"+numeroProcesso;
        

         $.ajax({
             url: query,
             success: function(data){
             
             }
         })

    }

</script>
@include('layouts.footer')
@endsection