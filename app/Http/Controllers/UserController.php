<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\chamado;
use App\Models\User;
use App\Models\ModelCalendario;
use DB;
use DataTables;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   function index(){
   

    //dd($chamados=chamado::all());
   // $chamados=chamado::all();
  // ($chamados=chamado::all());
    return view('dashboards.users.index');
   }

   function profile(){
       return view('dashboards.users.profile');
   }
   function calendar(){

    $id = Auth::id();
    $result=DB::select(DB::raw("select * from eventos where id_user=$id limit 6"));

    /*$chartData="";
    foreach($result as $list){
        $chartData.="['".$list->evento."'],";
    }
    $loop['chartData']=rtrim($chartData);
    //dd($loop);
    */

  // $result=ModelCalendario::paginate(6);
     //dd($result);

       return view('dashboards.users.calendar', compact('result'));
   }
    
   function updateInfo(Request $request){
           
    $validator = \Validator::make($request->all(),[
        'name'=>'required',
        'email'=> 'required|email|unique:users,email,'.Auth::user()->id,
        'favoritecolor'=>'required',
        'departamento'=>'required',
    ]);

    if(!$validator->passes()){
        return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
    }else{
         $query = User::find(Auth::user()->id)->update([
              'name'=>$request->name,
              'email'=>$request->email,
              'favoriteColor'=>$request->favoritecolor,
              'departamento'=>$request->departamento,
         ]);

         if(!$query){
             return response()->json(['status'=>0,'msg'=>'Ocorreu um erro.']);
         }else{
             return response()->json(['status'=>1,'msg'=>'Seu perfil foi actualizado com sucesso.']);
         }
    }
}

function UserUpdatePicture(Request $request){
$path = 'users/images/';
$file = $request->file('user_image');
$new_name = 'UIMG_'.date('Ymd').uniqid().'.jpg';

//Upload new image
$upload = $file->move(public_path($path), $new_name);

if( !$upload ){
    return response()->json(['status'=>0,'msg'=>'Ocorreu um erro ao tentar carregar nova foto.']);
}else{
    //Get Old picture
    $oldPicture = User::find(Auth::user()->id)->getAttributes()['picture'];

    if( $oldPicture != '' ){
        if( \File::exists(public_path($path.$oldPicture))){
            \File::delete(public_path($path.$oldPicture));
        }
    }

    //Update DB
    $update = User::find(Auth::user()->id)->update(['picture'=>$new_name]);

    if( !$upload ){
        return response()->json(['status'=>0,'msg'=>'Ocorreu um erro ao tentar atualizar foto.']);
    }else{
        return response()->json(['status'=>1,'msg'=>'Seu perfil foi atualizado com sucesso.']);
    }
}
}

}
