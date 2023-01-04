  <!DOCTYPE html>
  <!--
  This is a starter template page. Use this page to start your new project from
  scratch. This page gets rid of all links and provides the needed markup only.
  -->
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <base href="{{ \URL::to('/') }}">

      <link rel="stylesheet" href="{{ asset('datatable/css/dataTables.bootstrap.min.css') }}">
      <link rel="stylesheet" href="{{ asset('datatable/css/dataTables.bootstrap4.min.css') }}">
      <link rel="stylesheet" href="{{ asset('sweetalert2/sweetalert2.min.css') }}">
      <link rel="stylesheet" href="{{ asset('toastr/toastr.min.css') }}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('plugins/ijaboCropTool/ijaboCropTool.min.css') }}">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- fullCalendar -->
    <link rel="stylesheet" href="../plugins/fullcalendar/main.css">
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
      

        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{ \URL::to('/')}}" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Choupal</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{Auth::user()->picture}}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
          </div>
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-compact nav-child-indent nav-collapse-hide-child nav-flat" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item">
                  <a href="{{ route('user.dashboard')}}" class="nav-link {{ (request()->is('user/dashboard*')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                      Dashboard
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('user.profile')}}" class="nav-link {{ (request()->is('user/profile*')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                    Profile
                    </p>
                  </a>
                </li>
                <li class="nav-header">Calendario</li>
            <li class="nav-item">
              <a href="{{ route('user.calendar')}}" class="nav-link {{(request()->is('user/calendar*') )? 'active' : ''}}">
                <i class="nav-icon fas fa-calendar-alt"></i>
                <p>
                  Calendario
                  <span class="badge badge-info right"></span>
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
    @include('dashboards.users.editar-chamado')
    @include('dashboards.users.satisfacao')
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
      
      <!-- Default to the left -->
      <strong>Copyright &copy;2021- {{ date('yy')}}</strong> Todos direitos reservados.
    </footer>
  </div>
  <!-- ./wrapper -->
  
  <script src="{{ asset('jquery/jquery-3.6.0.min.js') }}"></script>
 <!-- jQuery 
  <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>-->
  <!-- jQuery UI -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script><!--IMPORTANTE PARA O CALENDARIO---->
  <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('plugins/ijaboCropTool/ijaboCropTool.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>

  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script><!---ESTE E PARA SIDEBAR A DIREITA COM AS DEVIDAS PROPRIEDADES--->
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <!--<script src="dist/js/pages/dashboard3.js"></script>-->
  <!-- fullCalendar 2.2.5 -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/fullcalendar/main.js"></script>
 <script src="{{asset('js/calendario.js')}}"></script>
 
  <!-- REQUIRED SCRIPTS -->

      <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    
      <script src="{{ asset('datatable/js/jquery.dataTables.min.js') }}"></script>
      <script src="{{ asset('datatable/js/dataTables.bootstrap4.min.js') }}"></script>
      <script src="{{ asset('sweetalert2/sweetalert2.min.js') }}"></script>
      <script src="{{ asset('toastr/toastr.min.js') }}"></script>
     <!-- <script src="{{asset('js/ajaxAdd.js')}}"></script>-->
  {{-- CUSTOM JS CODES --}}
  <script>

  $.ajaxSetup({
     headers:{
       'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
     }
  });
  
  $(function(){


    
//ADD NEW CHAMADO
$('#add-chamado-form').on('submit', function(e){
  e.preventDefault();
  var form = this;
  $.ajax({
      url:$(form).attr('action'),
      method:$(form).attr('method'),
      data:new FormData(form),
      processData:false,
      dataType:'json',
      contentType:false,
      beforeSend:function(){
          $(form).find('span.error-text').text('');
      },
      success:function(data){
          if(data.code == 0){
                $.each(data.error, function(prefix, val){
                    $(form).find('span.'+prefix+'_error').text(val[0]);
                });
          }else{
              $(form)[0].reset();
              //  alert(data.msg);
              $('#chamado-table').DataTable().ajax.reload(null, false);
              toastr.success(data.msg);
          }
      }
  });
});
//ADD EVENTO

  $('#add-evento').on('submit', function(e){
  e.preventDefault();
  var form=this;

  $.ajax({
  url:$(form).attr('action'),
  method:$(form).attr('method'),
  data:new FormData(form),
  processData:false,
  dataType:'json',
  contentType:false,
  beforeSend:function(){
    $(form).find('span.error-text').text('');

  },
  success:function(data){
    if(data.code==0){
      $.each(data.error, function(prefix, val){
          $(form).find('span.'+prefix+'_error').text(val[0]);
      });
    }else{
      $(form)[0].reset();
      $('#external-events').ajax.reload(null, false);
      toastr.success(data.msg);
    }
  }

});
});
//CONVERTE PARA MAISCULAS
function muda(qual) {
    uCase = qual.value.toUpperCase();
    qual.value = uCase;
}
//GET ALL CHAMADOS
$('#chamado-table').DataTable({
  //var user_id=$(this).data('id_user');
  processing:true,
  info:true,
  ajax:"{{ route('get.chamados.list') }}",
  "pageLength":5,
  "aLengthMenu":[[5,10,25,50,-1],[5,10,25,50,"Todos"]],
  columns:[
      //  {data:'id', name:'id'},
      {data:'checkbox', name:'checkbox', orderable:false, searchable:false},
      {data:'DT_RowIndex', name:'DT_RowIndex'},
      {data:'tipo', name:'tipo'},
      {data:'problema', name:'problema'},
      {data:'data', name:'data'},
      {data:'acoes', name:'acoes', orderable:false, searchable:false},
  ]
}).on('draw', function(){

$('input[name="chamado_checkbox"]').each(function(){this.checked=false;});
//$('input[name="problema_checkbox"]').each(function(){this.checked=false;});
$('input[name="main_checkbox"]').prop('checked', false);
$('button#deleteTodosBtn').addClass('d-one');
});

///EDIT CHAMADOS
$(document).on('click','#editChamadoBtn', function(){
  var chamado_id = $(this).data('id');
  $('.editChamado').find('form')[0].reset();
  $('.editChamado').find('span.error-text').text('');
  $.post('<?= route("get.chamados.details") ?>',{chamado_id:chamado_id}, function(data){
      //alert(data.details.nome);
      $('.editChamado').find('input[name="chamaid"]').val(data.details.id);
      $('.editChamado').find('textarea[name="problema"]').val(data.details.problema);
      $('.editChamado').find('select[name="tipo"]').val(data.details.tipo);
      $('.editChamado').modal('show');
  },'json');
});

//SATISFACAO DO USUARIO
$(document).on('click','#satisfeito', function(){
  var chamado_id = $(this).data('id');
  $('.satisfeito').find('form')[0].reset();
  $('.satisfeito').find('span.error-text').text('');
  $.post('<?= route("get.chamados.details") ?>',{chamado_id:chamado_id}, function(data){
      //alert(data.details.nome);
      $('.satisfeito').find('input[name="chamaid"]').val(data.details.id);
      //$('.satisfacao').find('input[name="id_user"]').val(data.details.id_user);
      $('.satisfeito').find('input[name="satisfacao"]');
      $('.satisfeito').modal('show');
  },'json');
});

//SATISFEITO
$('#satisfeito-form').on('submit', function(e){
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
        //  var token = $('meta[name="csrf_token"]').attr('content');

           // if (token) {
                 //return xhr.setRequestHeader('X-CSRF-TOKEN', token);
           // }
      },
      success: function(data){
            if(data.code == 0){
                $.each(data.error, function(prefix, val){
                  $(form).find('span.'+prefix+'_error').text(val[0]);
                });
            }else{
                $('#chamado-table').DataTable().ajax.reload(null, false);
                $('.satisfeito').modal('hide');
                $('.satisfeito').find('form')[0].reset();
                toastr.success(data.msg);
            }
      }
  });
});
//UPDATE CHAMDOS DETAILS
$('#update-form').on('submit', function(e){
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
        //  var token = $('meta[name="csrf_token"]').attr('content');

           // if (token) {
                 // return xhr.setRequestHeader('X-CSRF-TOKEN', token);
           // }
      },
      success: function(data){
            if(data.code == 0){
                $.each(data.error, function(prefix, val){
                    $(form).find('span.'+prefix+'_error').text(val[0]);
                });
            }else{
                $('#chamado-table').DataTable().ajax.reload(null, false);
                $('.editChamado').modal('hide');
                $('.editChamado').find('form')[0].reset();
                toastr.success(data.msg);
            }
      }
  });
});

//DELETE CHAMADO RECORD
$(document).on('click','#deleteChamadoBtn', function(){
  var chamado_id = $(this).data('id');
  var url = '<?= route("delete.chamado") ?>';

  swal.fire({
      title:'Atencao!',
      html:'Deseja <b>cancelar</b> este chamado?',
      showCancelButton:true,
      showCloseButton:true,
      cancelButtonText:'Cancelar',
      confirmButtonText:'Sim, Cancelar',
      cancelButtonColor:'#d33',
      confirmButtonColor:'#556ee6',
      width:300,
      allowOutsideClick:false
  }).then(function(result){
        if(result.value){
            $.post(url,{chamado_id:chamado_id}, function(data){
                if(data.code == 1){
                    $('#chamado-table').DataTable().ajax.reload(null, false);
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
                   $('button#deleteTodosBtn').text('Delete ('+$('input[name="chamado_checkbox"]:checked').length+')').removeClass('d-none');
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
                       title:'Tem Certeza?',
                       html:'Quer eliminar <b>('+checkedChamados.length+')</b> chamados',
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
                                  $('#chamado-table').DataTable().ajax.reload(null, true);
                                  toastr.success(data.msg);
                              }
                           },'json');
                       }
                   })
               }
           });
        


    /* UPDATE PERSONAL INFO */

    $('#userInfoForm').on('submit', function(e){
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
                  $('.user_name').each(function(){
                     $(this).html( $('#userInfoForm').find( $('input[name="name"]') ).val() );
                  });
                  toastr.success(data.msg);
                }
           }
        });
    });



    $(document).on('click','#change_picture_btn', function(){
      $('#user_image').click();
    });


    $('#user_image').ijaboCropTool({
          preview : '.user_picture',
          setRatio:1,
          allowedExtensions: ['jpg', 'jpeg','png'],
          buttonsText:['Recortar','Sair'],
          buttonsColor:['#30bf7d','#ee5155', -15],
          processUrl:'{{ route("userPictureUpdate") }}',
          // withCSRF:['_token','{{ csrf_token() }}'],
          onSuccess:function(message, element, status){
            // alert(message);
            toastr.success(message);
          },
          onError:function(message, element, status){
            //alert(message);
            toastr.error(message);
          }
       });

    
  });

</script>
  </body>
  </html>
