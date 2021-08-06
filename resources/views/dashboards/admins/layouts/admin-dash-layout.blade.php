    <!DOCTYPE html>
    <!--
    This is a starter template page. Use this page to start your new project from
    scratch. This page gets rid of all links and provides the needed markup only.
    -->
    <html lang="en">
    <head>
    <script type="text/javascript" src="{{ asset('jquery/gstatic.charts.loader.js')}}"></script>
    <script type="text/javascript" src="{{url('https://www.gstatic.com/charts/loader.js')}}"></script>
    
  <script type="text/javascript">
  google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        
      //////POR DEPARTAMENTO
      function drawChart() {
          var data = google.visualization.arrayToDataTable([
            ['Language', 'Speakers (in millions)'],
          
            <?php echo $chartData;?>
          ]);

          var options = {
            title: 'Chamados Tecnicos por Departamento',
          // legend: 'none',
            pieSliceText: 'label',
            slices: {  4: {offset: 0.2},
                      12: {offset: 0.3},
                      14: {offset: 0.4},
                      15: {offset: 0.5},
            },
          };

          var chart = new google.visualization.PieChart(document.getElementById('piechart1'));
          chart.draw(data, options);
      }

    </script>
    
    <script>
google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        
      ////LINHAS
  function drawChart() {
          var data = google.visualization.arrayToDataTable([
            ['Chamado', 'Dia'],
            
            <?php echo $chartData;?>
          ]);

          var options = {
            title: 'Chamados Tecnicos',
            //pieHole: 0.4,
            is3D: true,
          
          };

          var chart = new google.visualization.PieChart(document.getElementById('piechart'));

          chart.draw(data, options);
        }
    </script>
    <script>
      google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        
       //////////////////UPLOT
       function drawChart() {
          var data = google.visualization.arrayToDataTable([
            ['Tipo', 'Total'],
            <?PHP echo $chartData;?>
          ]);

          var options = {
            title: 'Chamados Tecnicos',
            curveType: 'function',
            legend: { position: 'bottom' }
          };

          var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

          chart.draw(data, options);
        
        }
    </script>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>@yield('title')</title>
      <base href="{{ \URL::to('/') }}">
      
      <!-- Google Font: Source Sans Pro -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
      <!-- Font Awesome Icons -->
      <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
      <link rel="stylesheet" href="{{ asset('plugins/ijaboCropTool/ijaboCropTool.min.css') }}">
      <!-- Theme style -->
      <link rel="stylesheet" href="dist/css/adminlte.min.css">
      <!-- fullCalendar -->
      <link rel="stylesheet" href="../plugins/fullcalendar/main.css">
      <!-- Theme style -->
      <!-- DataTables -->
      <link rel="stylesheet" href="{{ asset('datatable/css/dataTables.bootstrap.min.css') }}">
          <link rel="stylesheet" href="{{ asset('datatable/css/dataTables.bootstrap4.min.css') }}">
          <link rel="stylesheet" href="{{ asset('sweetalert2/sweetalert2.min.css') }}">
          <link rel="stylesheet" href="{{ asset('toastr/toastr.min.css') }}">
          
      <!-- Theme style -->
    </head>
    <body class="sidebar-mini layout-fixed text-sm">
    <div class="wrapper">

      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          </li>
        </ul>

        
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
         
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-user"></i>
              <span class="badge badge-danger navbar-badge">{{Auth::user()->where('role',2)->count()}}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              
              <div class="dropdown-divider"></div>
              <a class="dropdown-item">
                <!-- user start -->
                @foreach($users->where('role',2) as $user)
                <div class="media">
                
                  <img src="{{$user->picture}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      {{$user->name}}, {{$user->departamento}}
                    
                    </h3>
                    <p class="text-sm"></p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> {{$user->created_at}}</p>
                  </div><br>

                </div>
                @endforeach
                <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
              
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer">Ver Todos usuarios</a>
            </div>
          </li>
          <!-- Notifications Dropdown Menu -->
          <li class="nav-item dropdown"> 
          
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-bell"></i>
              <span class="badge badge-warning navbar-badge">@foreach($cont as $total){{$total->total}}@endforeach</span>
            </a>
          
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            @foreach($chamados as $chamado)
            <a href="#" class="dropdown-item">
            <div class="dropdown-divider"></div>
              <span class="dropdown-item dropdown-header">{{$chamado->nome}}</span>
              
              
                <i class="fas fa-envelope mr-2"></i> {{$chamado->problema}}
                <span class="float-right text-muted text-sm">{{$chamado->data}}</span>
              </a>
              @endforeach
          
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer">Ver todas notificacoes</a>
            </div>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="" role="button">
              <i class="fas fa-expand-arrows-alt"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
              <i class="fas fa-th-large"></i>
            </a>
          </li>
        </ul>

      </nav>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ \URL::to('/')}}" class="brand-link">
          <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">Choupal</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="{{ Auth::user()->picture }}" class="img-circle elevation-2 admin_picture" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block admin_name">{{ Auth::user()->name }}</a>
            </div>
          </div>


          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-compact nav-child-indent nav-collapse-hide-child nav-flat" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                  with font-awesome or any other icon font library -->
                  <li class="nav-item">
                    <a href="{{ route('admin.dashboard')}}" class="nav-link {{ (request()->is('user/dashboard*')) ? 'active' : '' }}">
                      <i class="nav-icon fas fa-home"></i>
                      <p>
                        Dashboard
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                <a href="{{ route('admin.widgets')}}" class="nav-link {{(request()->is('admin/widgets*') ? 'active' : '')}}">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Estatisticas
                    <span class="right badge badge-danger">@foreach($resolvidos as $res) {{$res->total}} @endforeach</span>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>
                    Tabelas
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  
                  <li class="nav-item">
                    <a href="{{ route('admin.data')}}" class="nav-link {{(request()->is('admin/data*') ? 'active' : '')}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Todos</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('admin.resolvidos')}}" class="nav-link {{(request()->is('admin/resolvidos*') ? 'active' : '')}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Resolvidos</p>
                    </a>
                  </li>
    </ul>
    <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-chart-pie"></i>
                  <p>
                    Graficos
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  
                  <li class="nav-item">
                    <a href="{{ route('admin.flot')}}" class="nav-link {{(request()->is('admin/flot*') ? 'active' : '')}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Flot</p>
                    </a>
                  </li> 
                  <li class="nav-item">
                    <a href="{{ route('admin.linhas')}}" class="nav-link {{(request()->is('admin/linhas*') ? 'active' : '')}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Linhas</p>
                    </a>
                  </li> 
                  <li class="nav-item">
                    <a href="{{ route('admin.uplot')}}" class="nav-link {{(request()->is('admin/uplot*') ? 'active' : '')}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Departamentos</p>
                    </a>
                  </li> 
                  
                </ul>
              </li>

                  <li class="nav-item">
                    <a href="{{ route('admin.profile')}}" class="nav-link {{ (request()->is('admin/profile*') ? 'active' : '' )}}">
                      <i class="nav-icon fas fa-user"></i>
                      <p>
                      Perfil
                      </p>
                    </a>
                  </li>
                  
              <li class="nav-item">
                <a href="{{ route('admin.calendar')}}" class="nav-link {{ (request()->is('admin/calendar*') ? 'active' : '' )}}">
                  <i class="nav-icon fas fa-calendar-alt"></i>
                  <p>
                    Calendario
                    <span class="badge badge-info right">2</span>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.settings')}}" class="nav-link {{ (request()->is('admin/settings*') ? 'active' : '' )}}">
                  <i class="nav-icon fas fa-cog"></i>
                  <p>
                  Definicoes
                  </p>
                </a>
              </li>
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
      @yield('content')
      @include('dashboards.admins.resolve-chamado')
      @include('dashboards.admins.desfazer')
      </div>
      <!-- /.content-wrapper -->

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- CONTEUDO DO SIDEBAR A DIREITA VEM AQUI...-->
      </aside>
      <!-- /.control-sidebar -->

      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
          Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2021-2021</strong> Todos direitos reservados.
      </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('jquery/jquery-3.6.0.min.js') }}"></script>
    <!-- jQuery UI -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('plugins/ijaboCropTool/ijaboCropTool.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
    <script src="{{ asset('dist/js/demo.js')}}"></script><!---ESTE E PARA SIDEBAR A DIREITA COM AS DEVIDAS PROPRIEDADES--->
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!--<script src="{{ asset('dist/js/pages/dashboard3.js')}}"></script>
    <!-- FLOT CHARTS -->
    <script src="{{ asset('plugins/flot/jquery.flot.js')}}"></script>
    <!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
    <script src="{{ asset('plugins/flot/plugins/jquery.flot.resize.js')}}"></script>
    <!-- FLOT PIE PLUGIN - also used to draw donut charts -->
  
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
      
        <script src="{{ asset('datatable/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('datatable/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('sweetalert2/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('toastr/toastr.min.js') }}"></script>

    <!--EM TESTEE
    <script src="https://code.highcharts.com/stock/highstock.js"></script>
    <script src="https://code.highcharts.com/stock/modules/data.js"></script>
    <script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/stock/modules/export-data.js"></script>-->
    <!-- fullCalendar 2.2.5 -->
    <script src="{{ asset('plugins/moment/moment.min.js')}}"></script>
    <script src="{{ asset('plugins/fullcalendar/main.js')}}"></script>
    <!--<script src="{{ asset('js/grafico.js')}}"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!--<script src="{{url('http://code.highcharts.com/highcharts.js')}}"></script>-->
    <script src="{{ asset('js/calendario.js')}}"></script>
  <!-- <script src="{{url('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js')}}"></script>
    <script src="{{url('http://code.highcharts.com/highcharts.js')}}"></script>
        <script src="{{url('http://code.highcharts.com/modules/exporting.js')}}"></script>-->
    {{-- CUSTOM JS CODES --}}
    <script>


      $.ajaxSetup({
        headers:{
          'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
      });
      
      $(function(){

    //GET ALL CHAMADOS
    $('#chamados').DataTable({
      processing:true,
      info:true,
      ajax:"{{ route('get.Adminchamados.list') }}",
      "pageLength":5,
      "aLengthMenu":[[5,10,25,50,-1],[5,10,25,50,"Todos"]],
      columns:[
          //  {data:'id', name:'id'},
          {data:'checkbox', name:'checkbox', orderable:false, searchable:false},
          {data:'DT_RowIndex', name:'DT_RowIndex'},
          {data:'nome', name:'nome'},
          {data:'departamento', name:'departamento'},
          {data:'tipo', name:'tipo'},
          {data:'problema', name:'problema'},
          {data:'data', name:'data'},
          {data:'acoes', name:'acoes', orderable:false, searchable:false},
      ]
    });
//////////////////////USUARIO
//GET ALL USERS 
    
$('#usuarios').DataTable({
      processing:true,
      info:true,
      ajax:"{{ route('get.users.list') }}",
      "pageLength":5,
      "aLengthMenu":[[5,10,25,50,-1],[5,10,25,50,"Todos"]],
      columns:[
          //  {data:'id', name:'id'},
          
          {data:'DT_RowIndex', name:'DT_RowIndex'},
          //{data:'picture', name:'picture'},
          {data:'name', name:'nome'},
          {data:'email', name:'email'},
          {data:'departamento', name:'departamento'},
          {data:'acoes', name:'acoes', orderable:false, searchable:false},
      ]
    });

 //DELETE CHAMADO RECORD
 $(document).on('click','#removeUser', function(){
      var user_id = $(this).data('id');
      var url = '<?= route("delete.user") ?>';

      swal.fire({
          title:'Muita Atencao',
          html:'Quer <b>eliminar</b> este Usuario?',
          showCancelButton:true,
          showCloseButton:true,
          cancelButtonText:'Cancelar',
          confirmButtonText:'Sim, Eliminar',
          cancelButtonColor:'#d33',
          confirmButtonColor:'#556ee6',
          width:300,
          allowOutsideClick:false
      }).then(function(result){
            if(result.value){
                $.post(url,{user_id:user_id}, function(data){
                    if(data.code == 1){
                        $('#usuarios').DataTable().ajax.reload(null, false);
                        toastr.success(data.msg);
                    }else{
                        toastr.error(data.msg);
                    }
                },'json');
            }
      });

    });

///////////////////////////delete usuarios
    //RESOLVER CHAMADOS DETAILS-----ESTES E O FORMULARIO
    $('#resolve').on('submit', function(e){
      e.preventDefault();
      var form = this;
      $.ajax({
          url:$(form).attr('action'),
          method:$(form).attr('method'),
          data:new FormData(form),
          processData:false,
          dataType:'json',
          contentType:false,
          beforeSend: function(){
              $(form).find('span.error-text').text('');
            
          },
          success: function(data){
                if(data.code == 0){
                    $.each(data.error, function(prefix, val){
                        $(form).find('span.'+prefix+'_error').text(val[0]);
                    });
                }else{
                    $('#chamado-pendente').DataTable().ajax.reload(null, false);
                    $('.ResolveChamado').modal('hide');
                    $('.ResolveChamado').find('form')[0].reset();
                    toastr.success(data.msg);
                }
          }
      });
    });
    //GET ALL CHAMADOS PENDENTES
    $('#chamado-pendente').DataTable({
      processing:true,
      info:true,
      ajax:"{{ route('get.AdminchamadosPendentes.list') }}",
      "pageLength":5,
      "aLengthMenu":[[5,10,25,50,-1],[5,10,25,50,"Todos"]],
      columns:[
          //  {data:'id', name:'id'},
          {data:'checkbox', name:'checkbox', orderable:false, searchable:false},
          {data:'DT_RowIndex', name:'DT_RowIndex'},
          {data:'nome', name:'nome'},
          
          {data:'tipo', name:'tipo'},
          {data:'problema', name:'problema'},
          {data:'data', name:'data'},
          {data:'acoes', name:'acoes', orderable:false, searchable:false},
      ]
    });

    $(document).on('click','#resolveBtn', function(){
      var chamado_id = $(this).data('id');
      $('.ResolveChamado').find('form')[0].reset();
      $('.ResolveChamado').find('span.error-text').text('');
      $.post('<?= route("get.resolver.details") ?>',{chamado_id:chamado_id}, function(data){
          //  alert(data.details.nome);
          $('.ResolveChamado').find('input[name="chamaid"]').val(data.details.id);
          $('.ResolveChamado').find('input[name="status"]');

          $('.ResolveChamado').modal('show');
      
      },'json');
    });

    //DESFAZER CHAMADOS DETAILS
    $('#desfazer').on('submit', function(e){
      e.preventDefault();
      var form = this;
      $.ajax({
          url:$(form).attr('action'),
          method:$(form).attr('method'),
          data:new FormData(form),
          processData:false,
          dataType:'json',
          contentType:false,
          beforeSend: function(){
              $(form).find('span.error-text').text('');
            
          },
          success: function(data){
                if(data.code == 0){
                    $.each(data.error, function(prefix, val){
                        $(form).find('span.'+prefix+'_error').text(val[0]);
                    });
                }else{
                    $('#chamado-resolvido').DataTable().ajax.reload(null, false);
                    $('.DesfazChamado').modal('hide');
                    $('.DesfazChamado').find('form')[0].reset();
                    toastr.success(data.msg);
                }
          }
      });
    });
    //GET ALL CHAMADOS RESOLVIDOS
    $('#chamado-resolvido').DataTable({
      processing:true,
      info:true,
      ajax:"{{ route('get.AdminchamadosResolvidos.list') }}",
      "pageLength":5,
      "aLengthMenu":[[5,10,25,50,-1],[5,10,25,50,"Todos"]],
      columns:[
          //  {data:'id', name:'id'},
          //{data:'checkbox', name:'checkbox', orderable:false, searchable:false},
          {data:'DT_RowIndex', name:'DT_RowIndex'},
          {data:'nome', name:'nome'},
          
          {data:'tipo', name:'tipo'},
          {data:'problema', name:'problema'},
          {data:'data', name:'data'},
          {data:'acoes', name:'acoes', orderable:false, searchable:false},
      ]
    });

    $(document).on('click','#desfazerBtn', function(){
      var chamado_id = $(this).data('id');
      $('.DesfazChamado').find('form')[0].reset();
      $('.DesfazChamado').find('span.error-text').text('');
      $.post('<?= route("get.resolver.details") ?>',{chamado_id:chamado_id}, function(data){
          //  alert(data.details.nome);
          $('.DesfazChamado').find('input[name="chamaid"]').val(data.details.id);
          $('.DesfazChamado').find('input[name="status"]');
          
          $('.DesfazChamado').modal('show');
      },'json');
    });

    //DELETE CHAMADO RECORD
    $(document).on('click','#deleteChamadoBtn', function(){
      var chamado_id = $(this).data('id');
      var url = '<?= route("delete.chamado") ?>';

      swal.fire({
          title:'Muita Atencao',
          html:'Quer <b>eliminar</b> este chamado?',
          showCancelButton:true,
          showCloseButton:true,
          cancelButtonText:'Cancelar',
          confirmButtonText:'Sim, Eliminar',
          cancelButtonColor:'#d33',
          confirmButtonColor:'#556ee6',
          width:300,
          allowOutsideClick:false
      }).then(function(result){
            if(result.value){
                $.post(url,{chamado_id:chamado_id}, function(data){
                    if(data.code == 1){
                        $('#chamado').DataTable().ajax.reload(null, false);
                        toastr.success(data.msg);
                    }else{
                        toastr.error(data.msg);
                    }
                },'json');
            }
      });

    });


    //APAGAR MULTIPLOS

    $(document).on('click','input[name="main_checkbox"]', function(){
                      if(this.checked){
                        $('input[name="chamado_checkbox"]').each(function(){
                            this.checked = true;
                        });
                      }else{
                        $('input[name="chamado_checkbox"]').each(function(){
                            this.checked = false;
                        });
                      }
                      toggledeleteTodosBtn();
              });
              $(document).on('change','input[name="chamado_checkbox"]', function(){
                  if( $('input[name="chamado_checkbox"]').length == $('input[name="chamado_checkbox"]:checked').length ){
                      $('input[name="main_checkbox"]').prop('checked', true);
                  }else{
                      $('input[name="main_checkbox"]').prop('checked', false);
                  }
                  toggledeleteTodosBtn();
              });
              function toggledeleteTodosBtn(){
                  if( $('input[name="chamado_checkbox"]:checked').length > 0 ){
                      $('button#deleteTodosBtn').text('Apaga ('+$('input[name="chamado_checkbox"]:checked').length+')').removeClass('d-none');
                  }else{
                      $('button#deleteTodosBtn').addClass('d-none');
                  }
              }

              $(document).on('click','button#deleteTodosBtn', function(){
                  var checkedChamados = [];
                  $('input[name="chamado_checkbox"]:checked').each(function(){
                    checkedChamados.push($(this).data('id'));
                  });
                  var url = '{{ route("delete.selected.chamados") }}';
                  if(checkedChamados.length > 0){
                      swal.fire({
                          title:'Muita Atencao!',
                          html:'Quer eliminar este(s) <b>('+checkedChamados.length+')</b> chamado(s)?',
                          showCancelButton:true,
                          showCloseButton:true,
                          confirmButtonText:'Sim, Eliminar',
                          cancelButtonText:'Cancelar',
                          confirmButtonColor:'#556ee6',
                          cancelButtonColor:'#d33',
                          width:300,
                          allowOutsideClick:false
                      }).then(function(result){
                          if(result.value){
                              $.post(url,{chamados_ids:checkedChamados},function(data){
                                  if(data.code == 1){
                                      $('#chamado').DataTable().ajax.reload(null, true);
                                      toastr.success(data.msg);
                                  }
                              },'json');
                          }
                      })
                  }
              });
          
        /* UPDATE ADMIN PERSONAL INFO */

        $('#AdminInfoForm').on('submit', function(e){
            e.preventDefault();

            $.ajax({
              url:$(this).attr('action'),
              method:$(this).attr('method'),
              data:new FormData(this),
              processData:false,
              dataType:'json',
              contentType:false,
              beforeSend:function(){
                  $(document).find('span.error-text').text('');
              },
              success:function(data){
                    if(data.status == 0){
                      $.each(data.error, function(prefix, val){
                        $('span.'+prefix+'_error').text(val[0]);
                      });
                    }else{
                      $('.admin_name').each(function(){
                        $(this).html( $('#AdminInfoForm').find( $('input[name="name"]') ).val() );
                      });
                      //alert(data.msg);
                      toastr.success(data.msg);
                    }
              }
            });
        });


        $(document).on('click','#change_picture_btn', function(){
          $('#admin_image').click();
        });


        $('#admin_image').ijaboCropTool({
              preview : '.admin_picture',
              setRatio:1,
              allowedExtensions: ['jpg', 'jpeg','png'],
              buttonsText:['Recortar','Sair'],
              buttonsColor:['#30bf7d','#ee5155', -15],
              processUrl:'{{ route("adminPictureUpdate") }}',
              // withCSRF:['_token','{{ csrf_token() }}'],
              onSuccess:function(message, element, status){
                alert(message);
              },
              onError:function(message, element, status){
                //alert(message);
                toastr.success(data.msg);
              }
          });


        $('#changePasswordAdminForm').on('submit', function(e){
            e.preventDefault();

            $.ajax({
                url:$(this).attr('action'),
                method:$(this).attr('method'),
                data:new FormData(this),
                processData:false,
                dataType:'json',
                contentType:false,
                beforeSend:function(){
                  $(document).find('span.error-text').text('');
                },
                success:function(data){
                  if(data.status == 0){
                    $.each(data.error, function(prefix, val){
                      $('span.'+prefix+'_error').text(val[0]);
                    });
                  }else{
                    $('#changePasswordAdminForm')[0].reset();
                    //alert(data.msg);
                    toastr.success(data.msg);
                  }
                }
            });
        });

        
      });

    </script>

    </body>
    </html>
