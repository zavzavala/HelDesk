<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChamadoController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\CalendarioController;
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

Route::middleware(['middleware'=>'PreventBackHistory'])->group(function () {
    Auth::routes();
});


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix'=>'admin', 'middleware'=>['isAdmin','auth','PreventBackHistory']], function(){
        Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');
        Route::get('profile',[AdminController::class,'profile'])->name('admin.profile');
        Route::get('settings',[AdminController::class,'settings'])->name('admin.settings');
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
       
});
Route::get('/chamado-list',[ChamadoController::class, 'index'])->name('chamado.list');
Route::post('/add-chamado',[ChamadoController::class,'addChamado'])->name('add.chamado');
Route::get('/getChamadosList',[ChamadoController::class, 'getChamadosList'])->name('get.chamados.list');
Route::get('/getAdminChamadosList',[ChamadoController::class, 'getAdminChamadosList'])->name('get.Adminchamados.list');
Route::get('/getAdminChamadosListPendentes',[ChamadoController::class, 'getAdminChamadosListPendentes'])->name('get.AdminchamadosPendentes.list');

Route::get('/getAdminChamadosListResolvidos',[ChamadoController::class, 'getAdminChamadosListResolvidos'])->name('get.AdminchamadosResolvidos.list');
///////USUARIOS
Route::get('/getUsers',[ChamadoController::class, 'getUsers'])->name('get.users.list');

Route::post('/deleteUser',[UserController::class,'deleteUser'])->name('delete.user');


Route::post('/getChamadoDetails',[ChamadoController::class, 'getChamadosDetails'])->name('get.chamados.details');
Route::post('/updateChamadosDetails',[ChamadoController::class, 'updateChamadoDetails'])->name('update.chamado.details');
Route::post('/deleteChamado',[ChamadoController::class,'deleteChamado'])->name('delete.chamado');

Route::post('/deleteSelectedChamados',[ChamadoController::class,'deleteSelectedChamados'])->name('delete.selected.chamados');

Route::post('/getResolverDetails',[ChamadoController::class, 'getResolverDetails'])->name('get.resolver.details');

Route::post('/resolverChamado',[ChamadoController::class,'resolverChamado'])->name('resolve.chamado.details');
///DESFAZER CHAMADO
Route::post('/getDesfazerDetails',[ChamadoController::class, 'getDesfazerDetails'])->name('get.desfazer.details');

Route::post('/desfazerrChamado',[ChamadoController::class,'desfazerChamado'])->name('desfazer.chamado.details');

Route::post('/getSelectedChamadosDetails',[ChamadoController::class, 'getSelectedChamadosDetails'])->name('get.resolveTodos.details');

Route::post('/resolverSelectedChamados',[ChamadoController::class,'resolverSelectedChamados'])->name('resolve.selected.chamados');

////    CALENDARO
Route::post('/AddEvento',[CalendarioController::class,'AddEvento'])->name('Add.calendario');