   
<div class="modal fade satisfeito" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Satisfacaos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                 <form action="<?= route('satisfacao.cliente') ?>" method="POST" id="satisfeito-form">
                    @csrf

                    <div class="form-group">
                     <input type="hidden" name="chamaid">
                     </div>        

            <div class="form-group">                
             <input type="text" class="form-control" value="satisfeito" name="satisfacao"> 
             <span class="text-danger error-text satisfacao_error"></span>                      
            </div>
                                                              
            <div class="form-group">
             <button type="submit" class="btn btn-block btn-success">Satisfeito</button>
            </div>

           </form>  
            </div>
        </div>
    </div>
</div>