@extends('layouts.app')

@section('content')

<div class="container">
   <div class="justify-content-center">
      <div class="col-md-12">
         <div class="card">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
               <li class="nav-item">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Lista de Agendamentos</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Agendamentos Arquivados</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" id="delete-tab" data-toggle="tab" href="#delete" role="tab" aria-controls="delete" aria-selected="false">Deletados</a>
               </li>
            </ul>
            
            <div class="tab-content" id="myTabContent">
               <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <div class="">
                    <h3 style="margin-left: 1%; margin-top: 2%;"> Lista de Agendamentos {{-- <small>Some examples to get you started</small> --}}</h3>
                    <a class="btn btn-success" style="margin-left: 90%; background:#3e276a; border-color: #32276a;" href="{{ url ('home/create')}}">Adicionar</a>
                </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                 <br>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                    <div class="x_content">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>CPF</th>
                                    <th>Processo</th>
                                    <th>Nome Contribuinte</th>
                                    <th>Endereço Visita</th>
                                    <th>Data Visita</th>
                                    <th>Hora Visita</th>
                                    <th>Status Contribuinte</th>
                                    <th>Status da Fiscalização</th>
                                    <th>Açoes</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dados as $dado)
                                    <tr>
                                        <td>{{$dado->cpf}}</td>
                                        <td>{{$dado->processo}}</td>
                                        <td>{{$dado->nome_contribuinte}}</td>
                                        <td>{{$dado->endereco_visita}}</td>
                                        <td>{{$dado->data}}</td>
                                        <td>{{ mb_strimwidth($dado->hora, 0, 8,"...")}}</td>
                                        <td>{{$dado->status}}</td>
                                        <td>{{$dado->statusinterno}}</td>
                                        <td>

                                          <a href="#"
                                            data-id="{{$dado->id}}" 
                                            data-processo="{{$dado->processo}}"
                                            id="btn_andamento_viagem" 
                                            class="btn btn-success btn-sm criar" 
                                            data-toggle="tooltip" 
                                            data-placement="bottom" 
                                            title="Mudar Status da fiscalização" 
                                            data-desabilitado="false"
                                             style="margin: 0.3125rem 1px;"
                                            > 
                                            <i class="fas fa-thumbs-up"></i>
                                            </a>

                                            <a href="#"
                                            data-id="{{$dado->id}}" 
                                            data-processo="{{$dado->processo}}"
                                            id="btn_andamento_viagem" 
                                            class="btn btn-danger btn-sm" 
                                            data-toggle="tooltip" 
                                            data-placement="bottom" 
                                            title="Mudar Status da fiscalização" 
                                            data-desabilitado="false" 
                                            > 
                                            <i class="far fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

               </div>

               <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                  <div class="">
                    <h3 style="margin-left: 1%; margin-top: 2%;"> Lista de Agendamentos Arquivados {{-- <small>Some examples to get you started</small> --}}</h3>
                </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                 <br>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                    <div class="x_content">
                        <table id="datatable2" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>CPF</th>
                                    <th>Processo</th>
                                    <th>Nome Contribuinte</th>
                                    <th>Endereço Visita</th>
                                    <th>Data Visita</th>
                                    <th>Hora Visita</th>
                                    <th>Status Contribuinte</th>
                                    <th>Status da Fiscalização</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dadosarq as $dado)
                                    <tr>
                                        <td>{{$dado->cpf}}</td>
                                        <td>{{$dado->processo}}</td>
                                        <td>{{$dado->nome_contribuinte}}</td>
                                        <td>{{$dado->endereco_visita}}</td>
                                        <td>{{$dado->data}}</td>
                                        <td>{{ mb_strimwidth($dado->hora, 0, 8,"...")}}</td>
                                        <td>{{$dado->status}}</td>
                                        <td>{{$dado->statusinterno}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


               </div>

               <div class="tab-pane fade" id="delete" role="tabpanel" aria-labelledby="delete-tab">
                <div class="">
                    <h3 style="margin-left: 1%; margin-top: 2%;"> Lista de Agendamentos Deletados {{-- <small>Some examples to get you started</small> --}}</h3>
                </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                 <br>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                    <div class="x_content">
                        <table id="datatable3" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>CPF</th>
                                    <th>Processo</th>
                                    <th>Nome Contribuinte</th>
                                    <th>Endereço Visita</th>
                                    <th>Data Visita</th>
                                    <th>Hora Visita</th>
                                    <th>Status Contribuinte</th>
                                    <th>Status da Fiscalização</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dadosdeletados as $dado)
                                    <tr>
                                        <td>{{$dado->cpf}}</td>
                                        <td>{{$dado->processo}}</td>
                                        <td>{{$dado->nome_contribuinte}}</td>
                                        <td>{{$dado->endereco_visita}}</td>
                                        <td>{{$dado->data}}</td>
                                        <td>{{ mb_strimwidth($dado->hora, 0, 8,"...")}}</td>
                                        <td>{{$dado->status}}</td>
                                        <td>{{$dado->statusinterno}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
               </div>


            </div>
         </div>
      </div>
   </div>
</div>

@include('layouts.footer')

@endsection

@push('scripts')

    <!-- Datatables -->
    <script src="{{ asset('vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
    <script src="{{ asset('vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
    <script src="{{ asset('vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{ asset('vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{ asset('vendors/pdfmake/build/vfs_fonts.js')}}"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/plug-ins/1.10.19/sorting/date-uk.js"></script>
   
    
    {{-- Sweet Alert --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    <script>
       $(function(){
        $("body").on("click", ".btn-danger", function(e){
          //Evitar que a pagina recarregue
          e.preventDefault();
          // Obter Processo do usuario
          let processo = $(this).data('processo');
          let id = $(this).data('id');

          //config do swal
            Swal.fire({
              title: 'Você tem certeza?',
              text: "Você não podera reverter essa ação!",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Sim, Exclua isso!'
            }).then((result) => {
                if (result.value) {
                  $.post('deletarel',{
                    _token:   '{{ csrf_token() }}',
                    id:     id,
                  })
                    Swal.fire({
                    title: 'Deletado!',
                    text: 'O Agendamento agora esta na guia Deletados.',
                    type: 'success'}).then(function(){
                      location.reload();
                    }
                  );
                }
              })
            });
          });
      

        $(function(){
            $("body").on("click", ".criar", function(e){
            // Evitar que a página recarregue
            e.preventDefault();
            // Obter Processo do usuario
            let processo = $(this).data('processo');
            let id = $(this).data('id');
            
            // Configuração do Sweet alert
                Swal.fire({
                    title: 'Selecione o Status da Fiscalização',
                    text: "Você realmente deseja alterar o status do processo "+processo+" ?",
                    input: 'select',
                    inputOptions: {
                        'Não Autorizado e Possivel Estimar': 'Não Autorizado e Possivel Estimar',
                        'Não Autorizado e Impossivel Estimar': 'Não Autorizado e Impossivel Estimar',
                        'Não Localizado': 'Não Localizado',
                        'Não Atendido': 'Não Atendido',
                        'Não Atendido e Possivel Estimar': 'Não Atendido e Possivel Estimar',
                        'Não Atendido e Impossivel Estimar': 'Não Atendido e Impossivel Estimar',
                        'Área de Risco': 'Área de Risco',
                        'Lote Vazio': 'Lote Vazio',
                        'Realizada': 'Realizada'
                    },
                    inputPlaceholder: 'Selecione o Status',
                    showCancelButton: true,
                }).then(function(data){
                    console.log(data);
                    $.post(" {{ url("/statusatt/") }}/"+data['value'],{
                    _token: 	'{{ csrf_token() }}',
   	 	 		          id: 		id,
   	 	 		    statusinterno: data
   	 	 	        }).done(function(){

                    //Recarregar a página
                    location.reload();
                    });
                });
            });   
        });
    
    </script>

    <script>

        $('#menu li').click(function(){
            $('#conteudo').load( this.data("target") );
        })

  
      $(function($){

        $('#datatable').DataTable({
          columnDefs: [
            {
                type: 'date-uk',
                targets: 4
            }
          ],
          "language": {
              "url": "js/portugues.json"
          }
        });

      });

      $(function($){

        $('#datatable2').DataTable({
          columnDefs: [
            {
                type: 'date-uk',
                targets: 4
            }
          ],
          "language": {
              "url": "js/portugues.json"
          }
        });

      });

      $(function($){

        $('#datatable3').DataTable({
          columnDefs: [
            {
                type: 'date-uk',
                targets: 4
            }
          ],
          "language": {
              "url": "js/portugues.json"
          }
        });

      });

    </script>

@endpush
