@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Estatisticas')

@section('content')

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!-- =========================================================== -->
        <h5 class="mt-4 mb-2">Total<code>Chamados</code></h5>
        <div class="row">
          @foreach($widgets as $chamado)
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-danger">
              <span class="info-box-icon"><i class="far fa-bookmark"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">{{$chamado->tipo}}</span>
                <span class="info-box-number">{{$chamado->todos}} {{$chamado->status}}</span>

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