   
<div class="modal fade editChamado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Atualizar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                 <form action="<?= route('update.chamado.details') ?>" method="POST" id="update-form">
                    @csrf
                     <input type="hidden" name="chamaid">
                                <div class="form-group">
                                
                                    <input hidden type="text" class="form-control" value="{{Auth::user()->name}}" name="nome" visible="false">
                                    <span class="text-danger error-text nome_error"></span>
                                </div>
                                <div class="form-group">
                          
                                    <input hidden type="text" class="form-control" value="{{Auth::user()->id}}" name="id_user">
                                    
                                </div>
                                
                                <div class="form-group">
                                    
                                    <input hidden type="text" class="form-control" value="{{Auth::user()->departamento }}" name="departamento">
                                    
                                </div>
                                <div class="form-group">
                                <select class="form-control" name="tipo" aria-label=".form-select-lg example">
                                        <option value="{{Auth::user()->tipo}}">{{Auth::user()->tipo}}</option>
                                        <option value="Computador">Computador</option>
                                        <option value="Impressora">Impressora</option>
                                        <option value="Internet">Internet</option>
                                        <option value="Outro">Outro</option>
                                        </select>
                                    <span class="text-danger error-text tipo_error"></span>
                                </div>
                                <div class="form-group">
                                
                                <label for="problema" class="form-label">Problema</label>
                                        <textarea class="form-control" style="upercase" value="{{Auth::user()->problema}}" name="problema" id="problema" rows="3"></textarea>
                              <!--  <input class="form-control" value="{{Auth::user()->problema}}" name="problema" id="problema" rows="3">-->
                                    <span class="text-danger error-text problema_error"></span>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-block btn-success">Atualizar</button>
                                </div>
                            </form>
                

            </div>
        </div>
    </div>
</div>