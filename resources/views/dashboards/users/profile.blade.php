@extends('dashboards.users.layouts.user-dash-layout')
@section('title','Perfil')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Perfil</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Pagina-principal</a></li>
                <li class="breadcrumb-item active">Perfil do usuario</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3">
  
              <!-- Profile Image -->
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle user_picture" src="{{ Auth::user()->picture }}" alt="User profile picture">
                  </div>
  
                  <h3 class="profile-username text-center user_name">{{Auth::user()->name}}</h3>
  
                  <p class="text-muted text-center">Usuario</p>

                  <input type="file" name="user_image" id="user_image" style="opacity: 0;height:1px;display:none">
                  <a href="javascript:void(0)" class="btn btn-primary btn-block" id="change_picture_btn"><b>Alterar foto</b></a>
                  
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
  
          
            </div>
            <!-- /.col -->
            <div class="col-md-9">
              <div class="card">
                <div class="card-header p-2">
                  <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#personal_info" data-toggle="tab">Meus dados</a></li>
                    <!--<li class="nav-item"><a class="nav-link" href="#change_password" data-toggle="tab">Change Password</a></li>-->
                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="personal_info">
                      <form class="form-horizontal" method="POST" action="{{ route('userUpdateInfo') }}" id="userInfoForm">
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Nome</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputName" placeholder="Nome" value="{{ Auth::user()->name }}" name="name">

                            <span class="text-danger error-text name_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputDep" class="col-sm-2 col-form-label">Departamento</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputDep" placeholder="Departamento" value="{{ Auth::user()->departamento }}" name="departamento">

                            <span class="text-danger error-text departamento_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">E-mail</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail" placeholder="E-mail" value="{{ Auth::user()->email }}" name="email">
                            <span class="text-danger error-text email_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName2" class="col-sm-2 col-form-label">Cor Favorita</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputName2" placeholder="Cor Favorita" value="{{ Auth::user()->favoriteColor }}" name="favoritecolor">
                            <span class="text-danger error-text favoritecolor_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-danger">Salvar</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- /.tab-pane -->
                  <!--  <div class="tab-pane" id="change_password">
                        <form class="form-horizontal" action="{{ route('adminChangePassword') }}" method="POST" id="changePasswordAdminForm">
                          <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Old Passord</label>
                            <div class="col-sm-10">
                              <input type="password" class="form-control" id="inputName" placeholder="Enter current password" name="oldpassword">
                              <span class="text-danger error-text oldpassword_error"></span>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">New Password</label>
                            <div class="col-sm-10">
                              <input type="password" class="form-control" id="newpassword" placeholder="Enter new password" name="newpassword">
                              <span class="text-danger error-text newpassword_error"></span>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Confirm New Password</label>
                            <div class="col-sm-10">
                              <input type="password" class="form-control" id="cnewpassword" placeholder="ReEnter new password" name="cnewpassword">
                              <span class="text-danger error-text cnewpassword_error"></span>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                              <button type="submit" class="btn btn-danger">Update Password</button>
                            </div>
                          </div>
                        </form>
                      </div>
                  </div>-->
                  <!-- /.tab-content -->
                </div><!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    

@endsection

