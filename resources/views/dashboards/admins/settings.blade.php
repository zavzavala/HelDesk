@extends('dashboards.admins.layouts.admin-dash-layout')
  @section('title','Definicoes')

  @section('content')

  <!-- Content Header (Page header) -->
  <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Usuarios</h1>
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
                  <table class="table table-hover table-condensed" id="usuarios">
                    <thead>
                    <tr>
                   
                                      <th>#</th>
                                      <th>Imagem</th>
                                      <th>Nome</th>
                                      <th>Email</th>
                                      <th>Departamento</th>
                                      
                                      
                                      <th>Acoes </th>
                                
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
     
  @endsection()