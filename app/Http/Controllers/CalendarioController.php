<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelCalendario;
use DB;


class CalendarioController extends Controller
{
    public function AddEvento(Request $request){
            $validator= \ Validator::make($request->all(),[
                    'id_user'=>'required',
                    'evento'=>'required',

            ]);
                if(!$validator->passes()){

      return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
                
    }else{

        $evento = new ModelCalendario();
        $evento->id_user=$request->id_user;
        $evento->evento=$request->evento;

        $query=$evento->save();

        if(!$query){

                return response()->json(['code'=>0, 'msg'=>'Ocorreu um erro.']);

        }else{
            return response()->json(['code'=>1, 'msg'=>'Evento salvo com sucesso.']);

        }



    }

    }
}
