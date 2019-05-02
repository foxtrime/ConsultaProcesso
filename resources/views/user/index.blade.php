@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div>
                <label>Consulte</label>
                <input type="text" class="form-control" name="processo" id="processo" style="width: 40%;" required>
            </div>
            
            <div class="row">
                <div style="padding-left: 47%;">
                    <button class='btn btn-success' id="procurar">Buscar</button>
                </div>
            </div>
            <div id="resp" class='alert'></div>
            <div id="processos" class='rounded'></div>
            <div id="nome_contribuintes" class='rounded'></div>
            <div id="endereco_visitas" class='rounded'></div>        
            <div id="datas" class='rounded'></div>
            <div id="horas" class='rounded'></div>
            <div id="statu" class='rounded'></div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $("button#procurar").click(function(event) {
            event.preventDefault();
            $('#resp').html("");
            $('#processos').html('');
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
                        $("#resp").html("<h3>Nenhum dado encontrado</h3>");
                    }else{
                        $('#processos').html("Processo: "+dados[0]['processo']);
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

</script>
@endsection
