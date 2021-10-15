   
<div class="modal fade Admin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Permissões</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                 <form action="<?= route('update.UserPermissoes.details') ?>" method="POST" id="alteraUSER">
                    @csrf
                     <input type="hidden" name="id_user">
                     <div class="card-body">
                     Atribuir permissões aos usuários
                     <div class="form-group">
                         <label for="admin">Insira um 1 para Admin & 2 para usuário simples. </label>
                             <input type="number" class="form-control" id="admin" name="role"> 
                        <span class="text-danger error-text role_error"></span>
                 </div>

            <div class="form-group">
            <button type="submit" class="btn btn-block btn-danger">Alterar</button>
             </div>
       </form>
                

            </div>
        </div>
    </div>
</div>