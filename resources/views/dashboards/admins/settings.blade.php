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

        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12">
            
            <a class="btn btn-danger" style="float:right;" href="{{route('commands/db:backup')}}">BackUp Banco</a>
            </div>
            
          </div>
        </div>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
             
                
              <div class="card">
              <div class="card-header p-2">
                  <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#Usuarios" data-toggle="tab">Usuarios</a></li>
                    <li class="nav-item"><a class="nav-link" href="#Historico" data-toggle="tab">Historico</a></li>
                  </ul>
                </div><!-- /.card-header -->
                <!-- /.card-header -->
                <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="Usuarios">
                  <table class="table table-hover table-condensed" id="usuarios">
                    <thead>
                    <tr>
                   
                                      <th>ID</th>
                                     
                                      <th>Usuário</th>
                                      <th>Email</th>
                                      <th>Departamento</th>
                                      <th>Nível de acesso</th>
                                      <th>Ações</th>               
                                
                    </tr>
                    </thead>
                    <tbody></tbody>
                    
                  </table>
              </div>
              <!--end tab-pane--->
              
              <div class="tab-pane" id="Historico">
               <table class="table table-hover table-condensed" id="historico_admin">
                  <thead>
                  
                  <th><input type="checkbox" name="main_checkbox"><label></label></th>
             
              <th>Chamado</th>
              <th>Solicitante</th>
              <th>IdTec.</th>
              <th>Tecnico</th>
              <th>Dep.</th>
              <th>Situacao</th>
              <th>Em</th>
              <th>Ate</th>
              <th>Ações<button class="btn btn-sm btn-danger d-none" id="deleteTodosBtn"></button></th>
              
              </thead>
              
              </table>
              </div>
              <!--end tab-pane historico-->
                </div>
                <!--Tab-content-->
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