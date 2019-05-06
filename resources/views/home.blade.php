@extends('layouts.app')

@section('content')
<div class="container">
    <div class="justify-content-center">
        <div class="col-md-12">
            <div class="card">
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
                                    <th>Status</th>                        
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
                                        <td>{{$dado->hora}}</td>
                                        <td>{{$dado->status}}</td>
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


    <script>
  
      $(function($){

        $('#datatable').DataTable({
          "language": {
              "url": "js/portugues.json"
          }
        });

      });

    </script>

@endpush