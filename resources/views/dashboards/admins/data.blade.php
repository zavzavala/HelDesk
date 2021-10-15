  @extends('dashboards.admins.layouts.admin-dash-layout')
  @section('title','Dados')

  @section('content')

  <!-- Content Header (Page header) -->
  <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Todos Chamados Tecnicos</h1>
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
                  <table class="table table-hover table-condensed" id="chamados">
                    <thead>
                    <tr>
                    <th><input type="checkbox" name="main_checkbox"><label></label></th>
                                      <th>#</th>
                                      <th>Usuario</th>
                                      <th>Departamento</th>
                                      <th>Tipo</th>
                                      <th>Problema</th>
                                      <th>Data</th>
                                      
                                      <th>Acoes <button class="btn btn-sm btn-danger d-none" id="deleteTodosBtn"></button></th>
                                
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