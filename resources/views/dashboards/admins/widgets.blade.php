@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Estatisticas')

@section('content')

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!-- =========================================================== -->
        <h5 class="mt-4 mb-2">Total<code> &nbsp; Membros ({{$cont}})</code></h5>
        <br>
        <div class="row">
          @foreach($widgets as $membros)
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-danger">
              <span class="info-box-icon"><i class="far fa-bookmark"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Membro(s) {{$membros->situacao_membro}}(s)</span>
                <span class="info-box-number"> {{$membros->total}} </span>

              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          @endforeach
          <!-- /.col -->
         
          
          
        </div>
        <!-- /.row -->



            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


@endsection()