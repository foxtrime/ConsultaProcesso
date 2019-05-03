@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard 
                    <a href="{{ url("/home/create")}}" type="button" class="btn btn-info btn-sm">
                    <i class="fa fa-plus"></i>
                    </a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table id="table" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Cpf</th>
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
@include('layouts.footer')
<script>

</script>
@endsection
