   
<div class="modal fade ResolveChamado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Este chamado foi resolvido?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                 <form action="<?= route('resolve.chamado.details') ?>" method="POST" id="resolve">
                    @csrf
                     <input type="hidden" name="chamaid">
                                <div class="form-group">
                                
                                    <input type="hidden" class="form-control" value="resolvido" name="status">
                                    
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-block btn-success">Sim, prosseguir</button>
                                </div>
                            </form>
                

            </div>
        </div>
    </div>
</div>