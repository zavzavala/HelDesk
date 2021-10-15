<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Historico_Model;
use DataTables;
use Illuminate\Support\Facades\Auth;

class HistoricoModelController extends Controller
{
    //
     // GET ALL HISTORICOS
     public function getHistoricoList(){
        $historico = Historico_Model::all();
       //$users= DB::select(DB::raw("select * from users"));
        
       return DataTables::of($historico)
       ->addIndexColumn()
       ->addColumn('acoes', function($row){
           return '<div class="btn-group">
                       <button class="btn btn-sm btn-danger" data-id="'.$row['id'].'" id="deleteHistoricoBtn">ELiminar</button>
                       
                       </div>';
       })
       ->addColumn('checkbox', function($row){
       return '<input type="checkbox" name="chamado_checkbox" data-id="'.$row['id'].'"><label></label>';
   })

   ->rawColumns(['acoes','checkbox'])
   ->make(true);
    }
      // DELETE HISTORICOS
 public function deleteHistorico(Request $request){
    $id_historico = $request->id_historico;
    $query = Historico_Model::find($id_historico)->delete();

    if($query){
        return response()->json(['code'=>1, 'msg'=>'Registo Eliminado com sucesso']);
    }else{
        return response()->json(['code'=>0, 'msg'=>'Falha ao tentar eliminar registo.']);
    }
}

public function TodosHistorico(Request $request){
    $historico_ids = $request->historico_ids;
    Historico_Model::whereIn('id', $historico_ids)->delete();
    return response()->json(['code'=>1, 'msg'=>'Registo(s) selecionado(s) eliminado(s) com sucesso.']); 
}

}
