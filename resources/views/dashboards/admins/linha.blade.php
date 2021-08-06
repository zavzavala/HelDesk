@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Graficos')

@section('content')

          
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="far fa-chart-bar"></i>
                  Grafico
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
              <div id="curve_chart" style="width:900px; height:500px;"> </div>
              </div>
              <!-- /.card-body-->
            
  

@endsection()
