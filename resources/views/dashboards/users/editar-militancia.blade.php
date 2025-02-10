   
<div class="modal fade editMilitanciax" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Atualizars</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{ route('update-militancia') }}" method="POST" id="update-militancia">
                    @csrf
                    <input type="hidden" name="militancia_id">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Membro *</label>

                            <select name="membro_id" class="form-control" >
                                <option value="">Selecione um membro</option>
                                @foreach ($membros as $membro)
                                    <option value="{{ $membro->id }}">{{ $membro->nome }} {{ $membro->apelido }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger error-text membro_id_error"></span>

                        </div>
                        <div class="col-md-6">
                            <label>Data Ingresso *</label>
                            <input type="date" name="data_ingresso" class="form-control">
                            <span class="text-danger error-text data_ingresso_error"></span>

                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label>Situação do Membro *</label>

                            <select name="situacao_membro" class="form-control" >
                                <option value="">Selecione</option>
                                <option value="Ativo">Activo</option>
                                <option value="Inativo">Inativo</option>
                                <option value="Expulso">Expulso</option>
                                
                            </select>
                            <span class="text-danger error-text situacao_membro_error"></span>

                        </div>
                        <div class="col-md-6">
                            <label>Função Celula*</label>
                            <select name="funcao_celula" class="form-control" >
                            <option value="">Selecione</option>
                                <option value="empregado">empregado</option>
                                <option value="Chefe">Chefe</option>
                                <option value="outro">outro</option>
                            </select>
                            <span class="text-danger error-text funcao_celula_error"></span>

                        </div>
                    </div>
                    
                    <div class="row mt-3">
                        
                        <div class="col-md-12">
                            <label>Celula</label>
                            <select name="celula" class="form-control">
                                <option value="">Selecione</option>
                                <option value="empregado">empregado</option>
                                <option value="Chefe">Chefe</option>
                                <option value="outro">outro</option>
                            </select>
                            <span class="text-danger error-text celula_error"></span>

                        </div>
                        <br>
                     

                    </div>
  
                    <div class="form-group">
                        <br>
                        <button type="submit" class="btn btn-block btn-success">Salvar</button>
                        
                    </div>
                </form>
                

            </div>
        </div>
    </div>
</div>