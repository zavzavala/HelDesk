@extends('dashboards.users.layouts.user-dash-layout')
@section('title','Chamados')

@section('content')

<div class="row" style="margin-top: 45px">
<div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Chamados</div>
                        <div class="card-body">
                            <table class="table table-hover table-condensed" id="chamado-table">
                                <thead>
                                <th><input type="checkbox" name="main_checkbox"><label></label></th>
                                    <th>#</th>
                                    <th>Tipo</th>
                                    <th>Problema</th>
                                    <th>Data</th>
                                    <th>Acoes <button class="btn btn-sm btn-danger d-none" id="deleteTodosBtn">Apaga todos</button></th>
                               
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
              </div>
              <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">NOVO CHAMADO</div>
                        
                        <div class="card-body">
                            <form action="{{ route('add.chamado') }}" method="post" id="add-chamado-form" autocomplete="off">
                                @csrf
                                <div class="form-group">
                                <p hidden>  <label for="nome">Nome</label></p>
                                    <input type="hidden" class="form-control" value="{{Auth::user()->name}}" name="nome" visible="false">
                                    <span class="text-danger error-text nome_error"></span>
                                </div>
                                <div class="form-group">
                                    
                                    <input type="hidden" class="form-control" value="{{Auth::user()->id}}" name="id_user">
                                   
                                </div>
                                <div class="form-group">
                                    
                                    <input type="hidden" class="form-control" value="{{Auth::user()->departamento}}" name="departamento">
                                    
                                </div>
                               <div class="form-group">
                                    
                                    <input type="hidden" class="form-control" value="pendente" name="status">
                                    
                                </div>
                                
                                <div class="form-group">
                                    
                                    <input hidden type="datetime" class="form-control" value="<?= NOW() ?>" name="data">
                                    
                                </div>
                                <div class="form-group">
                                    
                                    <input hidden type="text" class="form-control" value="{{Auth::user()->departamento }}" name="departamento">
                                    
                                </div>
                                <div class="form-group">
                                <label class="form-label">Tipo</label>
                                <select class="form-control" onblur="muda(this)" name="tipo" aria-label=".form-select-lg example">
                                        <option placeholder="Clique para seleciona"></option>
                                        <option value="Computador">Computador</option>
                                        <option value="Impressora">Impressora</option>
                                        <option value="Internet">Internet</option>
                                        <option value="Outro">Outro</option>
                                        </select>
                                    <span class="text-danger error-text tipo_error"></span>
                                </div>
                                <div class="form-group">
                                
                                <label for="forproblema" class="form-label">Problema</label>
                                <textarea class="form-control" onblur="muda(this)" cols="55" rows="5" name="problema" id="forproblema" placeholder="Descrever o problema" rows="3"></textarea>
                                    <span class="text-danger error-text problema_error"></span>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-block btn-success">Salvar</button>
                                </div>
                            </form>
                        </div>
                    </div>
              </div>
</div>

@endsection
