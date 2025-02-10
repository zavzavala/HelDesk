<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChamadoController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\HistoricoModelController;
use App\Http\Controllers\CalendarioController;
use App\Http\Controllers\MembroController;
use App\Http\Controllers\CartaoMembroController;
use App\Http\Controllers\MilitanciaController;
use App\Models\Militancia;
use Illuminate\Support\Facades\Auth;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
 //Route::get('/commands/{db:backup}', function ($command) {
  //Artisan::call($command);
  //return "Backup do Banco Feito Com Sucesso.";
    //return artisan::output();
 //})->name('commands/db:backup');

Route::get('backup', function(){

    Artisan::call('db:backup');
    return "Backup do Banco Feito Com Sucesso.";
})->name('commands/db:backup');

Route::middleware(['middleware'=>'PreventBackHistory'])->group(function () {
    Auth::routes();
});


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'master', 'middleware'=>['isMaster','auth', 'PreventBackHistory']], function(){
    Route::get('settings',[AdminController::class,'settings'])->name('master.settings');
});
Route::group(['prefix'=>'admin', 'middleware'=>['isAdmin','auth','PreventBackHistory']], function(){

        Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');


        Route::get('profile',[AdminController::class,'profile'])->name('admin.profile');
        //Route::get('settings',[AdminController::class,'settings'])->name('admin.settings');
        Route::get('uplot',[ChartController::class,'uplot'])->name('admin.uplot');
      
        Route::get('flot',[AdminController::class,'flot'])->name('admin.flot');
        Route::get('chartjs',[AdminController::class,'chartjs'])->name('admin.chartjs');

        Route::get('data',[AdminController::class,'data'])->name('admin.data');
        Route::get('resolvidos',[AdminController::class,'resolvidos'])->name('admin.resolvidos');
        Route::get('linhas',[AdminController::class,'linhas'])->name('admin.linhas');
        Route::get('widgets',[AdminController::class,'widgets'])->name('admin.widgets');
        Route::get('calendar',[AdminController::class,'calendar'])->name('admin.calendar');
    
        Route::post('update-profile-info',[AdminController::class,'updateInfo'])->name('adminUpdateInfo');
        Route::post('change-profile-picture',[AdminController::class,'updatePicture'])->name('adminPictureUpdate');
        Route::post('change-password',[AdminController::class,'changePassword'])->name('adminChangePassword');
       
});
      
Route::group(['prefix'=>'user', 'middleware'=>['isUser','auth','PreventBackHistory']], function(){
    Route::get('dashboard',[UserController::class,'index'])->name('user.dashboard');
    Route::get('profile',[UserController::class,'profile'])->name('user.profile');
    Route::get('calendar',[UserController::class,'calendar'])->name('user.calendar');
    
    Route::post('update-profile-info',[UserController::class,'updateInfo'])->name('userUpdateInfo');
    Route::post('change-profile-picture',[UserController::class,'UserUpdatePicture'])->name('userPictureUpdate');
    //Route::post('change-password',[UserController::class,'changePassword'])->name('adminChangePassword');
       
    Route::get('adicionar-membros',[MembroController::class,'create'])->name('add-membro');
    Route::get('membros',[MembroController::class,'index'])->name('get.membros');
    Route::get('Lstamembros',[MembroController::class,'getMembro'])->name('getMembro');

    Route::post('salvaMembro',[MembroController::class,'store'])->name('save-membro');
    
    Route::get('adicionar-cartao-membro',[CartaoMembroController::class,'create'])->name('add-cartao');
    Route::get('cartao',[CartaoMembroController::class,'index'])->name('cartao');
    Route::get('/Listacartao',[CartaoMembroController::class,'getCartao'])->name('getCartao');

    Route::post('salvaCartao',[CartaoMembroController::class,'store'])->name('save-cartao');
    
    
    Route::get('adicionar-militancia',[MilitanciaController::class,'create'])->name('add-militancia');
    Route::get('militancia',[MilitanciaController::class,'index'])->name('militancia');
    Route::get('ListaMilitancia',[MilitanciaController::class,'getMilitancia'])->name('getMilitancia');

    Route::post('SalvaMilitancia',[MilitanciaController::class,'store'])->name('save-militancia');
    
    /* EDIT */

    Route::post('/Editar-membro',[MembroController::class, 'MembrosDetalhes'])->name('membros.detalhes');
    Route::post('/UpdateMembro',[MembroController::class, 'updateMembro'])->name('update-membro');

    Route::post('/Editar-cartao',[CartaoMembroController::class, 'CartaoDetalhes'])->name('cartao.detalhes');
    Route::post('/UpdateCartao',[CartaoMembroController::class, 'updateCartao'])->name('update-cartao');

    Route::post('/Editar-militancia',[MilitanciaController::class, 'MilitanciaDetalhes'])->name('militancia.detalhes');
    Route::post('/UpdateMilitancia',[MilitanciaController::class, 'updateMilitancia'])->name('update-militancia');

    /* DROP */
    Route::post('/ELiminar-militancia',[MilitanciaController::class,'destroy'])->name('delete.militancia');

    Route::post('/ELiminar-cartao',[CartaoMembroController::class,'destroy'])->name('delete.cartao');

    Route::post('/ELiminar-membro',[MembroController::class,'destroy'])->name('delete.membro');


});
Route::get('/chamado-list',[ChamadoController::class, 'index'])->name('chamado.list');
Route::post('/add-chamado',[ChamadoController::class,'addChamado'])->name('add.chamado');
Route::get('/getChamadosList',[ChamadoController::class, 'getChamadosList'])->name('get.chamados.list');
Route::get('/getAdminChamadosList',[ChamadoController::class, 'getAdminChamadosList'])->name('get.Adminchamados.list');

Route::get('/getAdminChamadosListPendentes',[ChamadoController::class, 'getAdminChamadosListPendentes'])->name('get.AdminchamadosPendentes.list');


/* ADMIN */


Route::get('/TdosMembros', [MembroController::class, 'getMembros'])->name('allMembros');

Route::get('/getAdminChamadosListResolvidos',[ChamadoController::class, 'getAdminChamadosListResolvidos'])->name('get.AdminchamadosResolvidos.list');

Route::post('/AdmindeleteChamado',[ChamadoController::class,'AdmindeleteChamado'])->name('Admindelete.chamado');

Route::post('/AdmindeleteSelectedChamados',[ChamadoController::class,'AdmindeleteSelectedChamados'])->name('Admindelete.selected.chamados');

Route::get('/getHistoricoList',[HistoricoModelController::class, 'getHistoricoList'])->name('get.historico.list');
Route::post('/deleteHistorico',[HistoricoModelController::class,'deleteHistorico'])->name('delete.historico');

Route::post('/TodosHistorico',[HistoricoModelController::class,'TodosHistorico'])->name('historico.selected.delete');


///////USUARIOS
Route::get('/getUsers',[AdminController::class, 'getUsers'])->name('get.users.list');

Route::post('/deleteUser',[AdminController::class,'deleteUser'])->name('delete.user');

Route::post('/getInfoAdminDetails',[AdminController::class, 'getInfoAdminDetails'])->name('get.adminPermissoes.details');
Route::post('/updateInfoToADMIN',[AdminController::class, 'updateInfoToADMIN'])->name('update.UserPermissoes.details');

Route::post('/getChamadoDetails',[ChamadoController::class, 'getChamadosDetails'])->name('get.chamados.details');
Route::post('/updateChamadosDetails',[ChamadoController::class, 'updateChamadoDetails'])->name('update.chamado.details');
Route::post('/satisfacaoChamados', [ChamadoController::class, 'Satisfacao'])->name('satisfacao.cliente');
Route::post('/deleteChamado',[ChamadoController::class,'deleteChamado'])->name('delete.chamado');

Route::post('/deleteSelectedChamados',[ChamadoController::class,'deleteSelectedChamados'])->name('delete.selected.chamados');

Route::post('/getResolverDetails',[ChamadoController::class, 'getResolverDetails'])->name('get.resolver.details');

Route::post('/resolverChamado',[ChamadoController::class,'resolverChamado'])->name('resolve.chamado.details');
///DESFAZER CHAMADO
Route::post('/getDesfazerDetails',[ChamadoController::class, 'getDesfazerDetails'])->name('get.desfazer.details');

Route::post('/desfazerrChamado',[ChamadoController::class,'desfazerChamado'])->name('desfazer.chamado.details');

//Route::post('/getSelectedChamadosDetails',[ChamadoController::class, 'getSelectedChamadosDetails'])->name('get.resolveTodos.details');

//Route::post('/resolverSelectedChamados',[ChamadoController::class,'resolverSelectedChamados'])->name('resolve.selected.chamados');

////    CALENDARO
Route::post('/AddEvento',[CalendarioController::class,'AddEvento'])->name('Add.calendario');