toastr.options.preventDuplicates = true;

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

//GET ALL COUNTRIES
$('#chamado-table').DataTable({
  processing:true,
  info:true,
  ajax:"{{ route('get.chamados.list') }}",
  "pageLength":5,
  "aLengthMenu":[[5,10,25,50,-1],[5,10,25,50,"Todos"]],
  columns:[
      //  {data:'id', name:'id'},
      {data:'DT_RowIndex', name:'DT_RowIndex'},
      {data:'nome', name:'nome'},
      {data:'problema', name:'problema'},
      {data:'created_at', name:'data'},
      {data:'acoes', name:'acoes'},
  ]
});

$(document).on('click','#editChamadoBtn', function(){
  var chamada_id = $(this).data('id');
  $('.editChamado').find('form')[0].reset();
  $('.editChamado').find('span.error-text').text('');
  $.post('<?= route("get.chamados.details") ?>',{chamada_id:chamada_id}, function(data){
      //  alert(data.details.nome);
      $('.editChamado').find('input[name="chamaid"]').val(data.details.id);
      $('.editChamado').find('input[name="problema"]').val(data.details.problema);
      $('.editChamado').find('input[name="tipo"]').val(data.details.tipo);
      $('.editChamado').modal('show');
  },'json');
});


//UPDATE CHAMDOS DETAILS
$('#update-chamado-form').on('submit', function(e){
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
                $('#chamado-table').DataTable().ajax.reload(null, false);
                $('.editChamado').modal('hide');
                $('.editChamado').find('form')[0].reset();
                toastr.success(data.msg);
            }
      }
  });
});

//DELETE COUNTRY RECORD
$(document).on('click','#deleteChamadoBtn', function(){
  var chamado_id = $(this).data('id');
  var url = '<?= route("delete.chamado") ?>';

  swal.fire({
      title:'Tem certeza?',
      html:'quer <b>eliminar</b> este chamado',
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
                    $('#chamado-table').DataTable().ajax.reload(null, false);
                    toastr.success(data.msg);
                }else{
                    toastr.error(data.msg);
                }
            },'json');
        }
  });

});

});//Fim do function a cima