@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Dados')

@section('content')

 <!-- Content Header (Page header) -->
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Membros</h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              
            <div class="card">
            
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-hover table-condensed" id="membros">
                  <thead>
                  <tr>
                    <th>Nome</th>  
                    <th>Apelido</th>
                    <th>Sexo</th>
                    <th>Profissão</th>
                    <th>Habilitações Literárias</th>
                    <th>Nr. Cartõo membro</th>
                    <th>Data Emissão</th>
                    <th>Situação Membro</th>
                    <th>Função</th>
                    <th>celula</th>
                    <th>Data de ingresso</th>
                
                    <th>Acões </th>
                               
                  </tr>
                  </thead>
                  <tbody></tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection()