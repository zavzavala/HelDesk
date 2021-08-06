   
<div class="modal fade DesfazChamado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Deseja desfazer este Chamado?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                 <form action="<?= route('desfazer.chamado.details') ?>" method="POST" id="desfazer">
                    @csrf
                     <input type="hidden" name="chamaid">
                                <div class="form-group">
                                
                                    <input type="hidden" class="form-control" value="pendente" name="status">
                                    
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-block btn-danger">Sim, Desfazer</button>
                                </div>
                            </form>
                

            </div>
        </div>
    </div>
</div>