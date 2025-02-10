   
<div class="modal fade editMembrox" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Atualizars</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('update-membro') }}" method="POST" id="update-membro">
                    @csrf
                    <input type="hidden" name="membro_id" value="">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Nome *</label>
                            <input type="text" name="nome" class="form-control" >
                            <span class="text-danger error-text nome_error"></span>

                        </div>
                        <div class="col-md-6">
                            <label>Apelido *</label>
                            <input type="text" name="apelido" class="form-control" >
                            <span class="text-danger error-text apelido_error"></span>

                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label>Data de Nascimento *</label>
                            <input type="date" name="data_nascimento" class="form-control" >
                            <span class="text-danger error-text data_nascimento_error"></span>

                        </div>
                        <div class="col-md-6">
                            <label>Local de Nascimento *</label>
                            <input type="text" name="local_nascimento" class="form-control" >
                            <span class="text-danger error-text local_nascimento_error"></span>

                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label>Sexo *</label>
                            <select name="sexo" class="form-control" >
                                <option value="">Selecione</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Feminino">Feminino</option>
                                
                            </select>
                            <span class="text-danger error-text sexo_error"></span>

                        </div>
                        <div class="col-md-6">
                            <label>Estado Civil *</label>
                            <select name="estado_civil" class="form-control" >
                                <option value="">Selecione</option>
                                <option value="Solteiro">Solteiro</option>
                                <option value="Casado">Casado</option>
                                <option value="Divorciado">Divorciado</option>
                                <option value="Viúvo">Viúvo</option>
                            </select>
                            <span class="text-danger error-text estado_civil_error"></span>

                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label>Profissão *</label>
                            <input type="text" name="profissao" class="form-control" >
                            <span class="text-danger error-text profissao_error"></span>

                        </div>
                        <div class="col-md-6">
                            <label>Habilitações Literárias</label>
                            <input type="text" name="habilitacoes_literarias" class="form-control">
                            <span class="text-danger error-text habilitacoes_literarias_error"></span>

                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label>Documento de Identificação *</label>
                            <input type="text" name="documento_identificacao" class="form-control" >
                            <span class="text-danger error-text documento_identificacao_error"></span>

                        </div>
                        <div class="col-md-6">
                            <label>Data de Emissão do Documento *</label>
                            <input type="date" name="data_emissao_documento" class="form-control" >
                            <span class="text-danger error-text data_emissao_documento_error"></span>

                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label>Domicílio *</label>
                            <input type="text" name="domicilio" class="form-control" >
                            <span class="text-danger error-text domicilio_error"></span>

                        </div>
                        <div class="col-md-6">
                            <label>Classificação Social</label>
                            <select name="classificacao_social" class="form-control">
                                <option value="">Selecione</option>
                                <option value="Baixa">Baixa</option>
                                <option value="Média">Média</option>
                                <option value="Alta">Alta</option>
                            </select>
                            <span class="text-danger error-text classificacao_social_error"></span>

                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-3">
                            <label>Cartão do Eleitor *</label>
                            <input type="text" name="cartao_eleitor" class="form-control" >
                            <span class="text-danger error-text cartao_eleitor_error"></span>

                        </div>
                        <div class="col-md-3">
                            <label>Nuit *</label>
                            <input type="text" name="nuit" class="form-control" >
                            <span class="text-danger error-text nuit_error"></span>

                        </div>
                        <div class="col-md-6">
                            <label>Carta de Condução</label>
                            <input type="text" name="carta_conducao" class="form-control">
                            <span class="text-danger error-text carta_conducao_error"></span>

                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                            <a href="{{ route('get.membros') }}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>