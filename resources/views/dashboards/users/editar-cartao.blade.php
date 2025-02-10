   
<div class="modal fade editCartaox" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Alterar dados do Cartão</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= route('update-cartao') ?>" method="POST" id="update-cartao">
                    @csrf
                    <div class="form-group">
                            
                        <input type="hidden" class="form-control" value="{{Auth::user()->id}}" name="id_user">
                        <input type="hidden" class="form-control" name="cartao_id">
                        
                        
                    </div>
                    
                    <div class="form-group">
                        <label>Membro *</label>
                        <select name="membro_id" class="form-control" >
                            <option value="">Selecione um membro</option>
                            @foreach ($membros as $membro)
                                <option value="{{ $membro->id }}">{{ $membro->nome }} {{ $membro->apelido }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger error-text membro_id_error"></span>
                    </div>
                    <div class="form-group">
                        
                        <label  class="form-label">Número do Cartão *</label>
                        <input type="text" name="numero" class="form-control" maxLength='15'>
                        <span class="text-danger error-text numero_error"></span>

                    </div>

                    <div class="form-group">
                        <label>Data de Emissão *</label>
                        <input type="date" name="data_emissao" class="form-control" >
                        <span class="text-danger error-text data_emissao_error"></span>
                    
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-success">Salvar</button>
                    </div>
                </form>
                

            </div>
        </div>
    </div>
</div>