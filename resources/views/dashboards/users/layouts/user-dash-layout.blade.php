  <!DOCTYPE html>
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
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-table"></i>
                    <p>
                      Membros
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    
                  <li class="nav-item">
                    <a href="{{ route('add-membro')}}" class="nav-link {{(request()->is('user.add-membro.*') )? 'active' : ''}}">
                      <i class="nav-icon fas fa-user"></i>
                      <p>
                        Membros
                        <span class="badge badge-info right"></span>
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('get.membros')}}" class="nav-link {{(request()->is('user.get.membros.*') )? 'active' : ''}}">
                      <i class="nav-icon fas fa-user"></i>
                      <p>
                        Visualizar Membros
                        <span class="badge badge-info right"></span>
                      </p>
                    </a>
                  </li>
                </li>
              </ul>
           
            

            <li class="nav-item">
              <a href="{{ route('add-cartao')}}" class="nav-link {{(request()->is('user.add-cartao.*') )? 'active' : ''}}">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Cartão do Membro
                  <span class="badge badge-info right"></span>
                </p>
              </a>
            </li>
          
            <li class="nav-item">
              <a href="{{ route('add-militancia')}}" class="nav-link {{(request()->is('user.add-militancia.*') )? 'active' : ''}}">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Militancia
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

    /* -------------------------------------------------------------------------------------------------- */
    $('#add-membro').on('submit', function(e){
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
                  $('#membro-table').DataTable().ajax.reload(null, false);
                  toastr.success(data.msg);
              }
          }
      });
    });

    //////////////CARTAO

    $('#add-cartao').on('submit', function(e){
      e.preventDefault();
     //alert('jkl');
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
                  $('#cartao-table').DataTable().ajax.reload(null, false);
                  toastr.success(data.msg);
              }
          }
      });
    });

    //////////////////Militancia

    $('#add-militancia').on('submit', function(e){
      e.preventDefault();
     //alert('jkl');
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
                  // alert(data.msg);
                  $('#militancia-table').DataTable().ajax.reload(null, false);
                  toastr.success(data.msg);
              }
          }
      });
    });

    /* ------------------------------------------Tabelas */

    $('#membro-table').DataTable({
    
      processing:true,
      info:true,
      ajax:"{{ route('getMembro') }}",
      "pageLength":5,
      "aLengthMenu":[[5,10,25,50,-1],[5,10,25,50,"Todos"]],
      columns:[
         
          {data:'DT_RowIndex', name:'DT_RowIndex'},
          {data:'nome', name:'nome'},
          {data:'apelido', name:'apelido'} ,
          {data:'sexo', name:'sexo'},
          {data:'profissao', name:'profissao'},
          {data:'habilitacoes_literarias', name:'habilitacoes_literarias'},
          {data:'classificacao_social', name:'classificacao_social'},
          {data:'documento_identificacao', name:'documento_identificacao'},
          
          {data:'acoes', name:'acoes', orderable:false, searchable:false},
      ]

    });

    /* ------------------CARTAO */

    $('#cartao-table').DataTable({
    
      processing:true,
      info:true,
      ajax:"{{ route('getCartao') }}",
      "pageLength":5,
      "aLengthMenu":[[5,10,25,50,-1],[5,10,25,50,"Todos"]],
      columns:[
        
          {data:'DT_RowIndex', name:'DT_RowIndex'},
          {data:'nome', name:'nome'},
          {data:'apelido', name:'apelido'} ,
          {data:'sexo', name:'sexo'},
          {data:'numero', name:'numero'},
          {data:'data_emissao', name:'data_emissao'},
          
          {data:'acoes', name:'acoes', orderable:false, searchable:false},
      ]

    });



          /* -----------Militancia ----*/
    $('#militancia-table').DataTable({
    
      processing:true,
      info:true,
      ajax:"{{ route('getMilitancia') }}",
      "pageLength":5,
      "aLengthMenu":[[5,10,25,50,-1],[5,10,25,50,"Todos"]],
      columns:[
        
          {data:'DT_RowIndex', name:'DT_RowIndex'},
          {data:'membro.nome', name:'nome'},
          {data:'membro.apelido', name:'apelido'} ,
          {data:'membro.sexo', name:'sexo'},
          {data:'situacao_membro', name:'situacao_membro'},
          {data:'funcao_celula', name:'funcao_celula'},
          {data:'celula', name:'celula'},

          {data:'data_ingresso', name:'data_ingresso'},
          
          {data:'acoes', name:'acoes', orderable:false, searchable:false},
      ]

    }); 
    /*------------------EDit */
    
    $(document).on('click','#editMembroBtn', function(){
    var membro_id = $(this).data('id');
      //alert(membro_id);
    $('.editMembro').find('form')[0].reset();
    $('.editMembro').find('span.error-text').text('');
    $.post('<?= route("membros.detalhes") ?>',{membro_id:membro_id}, function(data){
        //alert(data.details.nome);
        $('.editMembro').find('input[name="membro_id"]').val(data.details.id);
        $('.editMembro').find('input[name="nome"]').val(data.details.nome);
        $('.editMembro').find('input[name="apelido"]').val(data.details.apelido);
        $('.editMembro').find('input[name="local_nascimento"]').val(data.details.local_nascimento);

        $('.editMembro').find('input[name="data_nascimento"]').val(data.details.data_nascimento);
        $('.editMembro').find('select[name="estado_civil"]').val(data.details.estado_civil);
        $('.editMembro').find('input[name="profissao"]').val(data.details.profissao);
        $('.editMembro').find('input[name="habilitacoes_literarias"]').val(data.details.habilitacoes_literarias);
        $('.editMembro').find('input[name="documento_identificacao"]').val(data.details.documento_identificacao);
        $('.editMembro').find('input[name="data_emissao_documento"]').val(data.details.data_emissao_documento);
        $('.editMembro').find('input[name="domicilio"]').val(data.details.domicilio);
        $('.editMembro').find('select[name="classificacao_social"]').val(data.details.classificacao_social);
        $('.editMembro').find('input[name="cartao_eleitor"]').val(data.details.cartao_eleitor);
        $('.editMembro').find('input[name="carta_conducao"]').val(data.details.carta_conducao);
        $('.editMembro').find('input[name="nuit"]').val(data.details.nuit);
        $('.editMembro').find('select[name="sexo"]').val(data.details.sexo);

        $('.editMembro').modal('show');
    },'json');
  });


  //Militancia
  $(document).on('click','#editMilitanciaBtn', function(){
    var militancia_id = $(this).data('id');
    //alert(militancia_id);
    $('.editMilitancia').find('form')[0].reset();
    $('.editMilitancia').find('span.error-text').text('');
    $.post('<?= route("militancia.detalhes") ?>',{militancia_id:militancia_id}, function(data){
        //alert(data.details.nome);
        $('.editMilitancia').find('input[name="militancia_id"]').val(data.details.id);
        $('.editMilitancia').find('select[name="membro_id"]').val(data.details.membro_id);
        $('.editMilitancia').find('input[name="data_ingresso"]').val(data.details.data_ingresso);
        $('.editMilitancia').find('select[name="situacao_membro"]').val(data.details.situacao_membro);
        $('.editMilitancia').find('select[name="funcao_celula"]').val(data.details.funcao_celula);
        $('.editMilitancia').find('select[name="celula"]').val(data.details.celula);

        $('.editMilitancia').modal('show');
    },'json');
  });


  /* CArtao */
  $(document).on('click','#editCartaoBtn', function(){
    var cartao_id = $(this).data('id');
    //alert(militancia_id);
    $('.editCartao').find('form')[0].reset();
    $('.editCartao').find('span.error-text').text('');
    $.post('<?= route("cartao.detalhes") ?>',{cartao_id:cartao_id}, function(data){
        //alert(data.details.nome);
        $('.editCartao').find('input[name="cartao_id"]').val(data.details.id);
        $('.editCartao').find('select[name="membro_id"]').val(data.details.membro_id);
        $('.editCartao').find('input[name="numero"]').val(data.details.numero);
        $('.editCartao').find('input[name="data_emissao"]').val(data.details.data_emissao);

        $('.editCartao').modal('show');
    },'json');
  });
    /* ----------------UPDATE-------------------- */

    $('#update-membro').on('submit', function(e){
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
                $('#membro-table').DataTable().ajax.reload(null, false);
                $('.editMembro').modal('hide');
                $('.editMembro').find('form')[0].reset();
                toastr.success(data.msg);
            }
          }
      });
    });

    $('#update-militancia').on('submit', function(e){
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
                $('#militancia-table').DataTable().ajax.reload(null, false);
                $('.editMilitancia').modal('hide');
                $('.editMilitancia').find('form')[0].reset();
                toastr.success(data.msg);
            }
          }
      });
    });


    $('#update-cartao').on('submit', function(e){
      
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
                $('#cartao-table').DataTable().ajax.reload(null, false);
                $('.editCartao').modal('hide');
                $('.editCartao').find('form')[0].reset();
                toastr.success(data.msg);
            }
          }
      });
    });


    /* ------------------Delete */

    $(document).on('click','#deleteCartaoBtn', function(){
      var cartao_id = $(this).data('id');
      //alert(cartao_id);
      var url = '<?= route("delete.cartao") ?>';
      
      swal.fire({
          title:'Atencao!',
          html:'Deseja <b>Eliminar</b> este Cartão?',
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
                $.post(url,{cartao_id:cartao_id}, function(data){
                    if(data.code == 1){
                        $('#cartao-table').DataTable().ajax.reload(null, false);
                        toastr.success(data.msg);
                    }else{
                        toastr.error(data.msg);
                    }
                },'json');
            }
      });

    });

    
    $(document).on('click','#deleteMembroBtn', function(){
      var membro_id = $(this).data('id');
      //alert(membro_id);
      var url = '<?= route("delete.membro") ?>';
      
      swal.fire({
          title:'Atencao!',
          html:'Deseja <b>Eliminar</b> este Membro?',
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
                $.post(url,{membro_id:membro_id}, function(data){
                    if(data.code == 1){
                        $('#membro-table').DataTable().ajax.reload(null, false);
                        toastr.success(data.msg);
                    }else{
                        toastr.error(data.msg);
                    }
                },'json');
            }
      });

    });


    $(document).on('click','#deleteMilitanciaBtn', function(){
      var militancia_id = $(this).data('id');
      //alert(membro_id);
      var url = '<?= route("delete.militancia") ?>';
      
      swal.fire({
          title:'Atencao!',
          html:'Deseja <b>Eliminar</b> este Militancia?',
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
                $.post(url,{militancia_id:militancia_id}, function(data){
                    if(data.code == 1){
                        $('#militancia-table').DataTable().ajax.reload(null, false);
                        toastr.success(data.msg);
                    }else{
                        toastr.error(data.msg);
                    }
                },'json');
            }
      });

    });

  });

</script>
  </body>
  </html>
