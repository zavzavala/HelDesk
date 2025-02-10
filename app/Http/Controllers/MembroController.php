<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Membro;
use Yajra\DataTables\DataTables;
use DB;
class MembroController extends Controller
{

    public function index(){

        $membros = Membro::all();
        return view('dashboards.Membros.ver_membros', compact('membros'));

    }
    public function getMembro(){

        $membro = Membro::all();
        return DataTables::of($membro)
        ->addIndexColumn()
        ->addColumn('acoes', function($row){
            return '<div class="btn-group">
                            <button class="btn btn-sm btn-primary" data-id="'.$row['id'].'" id="editMembroBtn">Editar</button>
                            <button class="btn btn-sm btn-danger" data-id="'.$row['id'].'" id="deleteMembroBtn">Eliminar</button>
                           
                            </div>';
        })
            ->rawColumns(['acoes'])
            ->make(true);
        //return view('dashboards.Membros.ver_membros', compact('membro'));

    }
    public function create(){
        $membros = Membro::all();
        return view('dashboards.Membros.membros', compact('membros'));
    }
    public function store(Request $request)
    {
     
        $validator = \Validator::make($request->all(),[
            'nome' => 'required|string|max:255',
            'apelido' => 'required|string|max:255',
            'data_nascimento' => 'required|date',
            'local_nascimento' => 'required|string|max:255',
            'sexo' => 'required|string',
            'estado_civil' => 'required|string',
            'profissao' => 'required|string|max:255',
            'classificacao_social'=>'required|string|max:255',
            'habilitacoes_literarias'=>'required|string|max:255',
            'documento_identificacao' => 'required|string|max:255',
            'data_emissao_documento' => 'required|date',
            'domicilio' => 'required|string|max:255',
            'carta_conducao'=> 'required|string|max:255',
            'cartao_eleitor' => 'required|string|max:255',
            'nuit' => 'required|string|max:255',
        ]);
        if(!$validator->passes()){
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
        }else{
            $sucesso = Membro::create($request->all());

            if(!$sucesso){
                return response()->json(['code'=>0,'msg'=>'Ocorreu um erro.']);
            }else{
                return response()->json(['code'=>1,'msg'=>'Membro cadastrado com sucesso!']);
            }
        }
        
    }

    public function MembrosDetalhes(Request $request){
        
        $membro_id = $request->membro_id;
        $MembroDetalhes = Membro::find($membro_id);
        return response()->json(['details'=>$MembroDetalhes]);
        
    }

    
    public function updateMembro(Request $request){

            $id = $request->membro_id;
            
        $validator = \Validator::make($request->all(),[
            'nome' => 'required|string|max:255',
            'apelido' => 'required|string|max:255',
            'data_nascimento' => 'required|date',
            'local_nascimento' => 'required|string|max:255',
            'sexo' => 'required|string',
            'estado_civil' => 'required|string',
            'profissao' => 'required|string|max:255',
            'classificacao_social'=>'required|string|max:255',
            'habilitacoes_literarias'=>'required|string|max:255',
            'documento_identificacao' => 'required|string|max:255',
            'data_emissao_documento' => 'required|date',
            'domicilio' => 'required|string|max:255',
            'carta_conducao'=> 'required|string|max:255',
            'cartao_eleitor' => 'required|string|max:255',
            'nuit' => 'required|string|max:255',
        ]);
        if(!$validator->passes()){
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
        }else{
            $sucesso = Membro::find($id);

            $sucesso->nome = $request->nome;
            $sucesso->apelido = $request->apelido;
            $sucesso->data_nascimento = $request->data_nascimento;
            $sucesso->local_nascimento = $request->local_nascimento;
            $sucesso->sexo = $request->sexo;
            $sucesso->estado_civil = $request->estado_civil;
            $sucesso->profissao = $request->profissao;
            $sucesso->classificacao_social = $request->classificacao_social;
            $sucesso->habilitacoes_literarias = $request->habilitacoes_literarias;

            $sucesso->documento_identificacao = $request->documento_identificacao;
            $sucesso->data_emissao_documento = $request->data_emissao_documento;
            $sucesso->domicilio = $request->domicilio;
            $sucesso->carta_conducao = $request->carta_conducao;

            $sucesso->cartao_eleitor = $request->cartao_eleitor;
            $sucesso->nuit = $request->nuit;
          
            $save = $sucesso->save();
            
            if(!$sucesso){
                return response()->json(['code'=>0,'msg'=>'Ocorreu um erro.']);
            }else{
                return response()->json(['code'=>1,'msg'=>'Membro cadastrado com sucesso!']);
            }
        }
    }

    public function destroy(Request $request){

        $membro_id = $request->membro_id;
        $query = Membro::find($membro_id)->delete();

        if($query){
            return response()->json(['code'=>1, 'msg'=>'Eliminado com sucesso']);
        }else{
            return response()->json(['code'=>0, 'msg'=>'Algo deu errado.']);
        }

    }

    public function getMembros(){
        
        //$membro = Membro::with('militancia')->with('cartao')->get();
            //$membro = Membro:all();
        $membro = DB::table('membros')
            ->leftJoin('cartao_membros','membros.id', '=', 'cartao_membros.membro_id')
                ->leftJoin('militancia','membros.id', '=', 'militancia.membro_id')
                    ->select('membros.*','cartao_membros.data_emissao', 'cartao_membros.numero', 'militancia.data_ingresso', 'militancia.situacao_membro', 'militancia.funcao_celula', 'militancia.celula')
                        ->get(); 
        return DataTables::of($membro)
        ->addIndexColumn()
        ->addColumn('acoes', function($row){
            return '<div class="btn-group">
                            <button class="btn btn-sm btn-primary" data-id="'.$row->id.'" id="editMembroBtn">Visualizar</button>
                            <button class="btn btn-sm btn-danger" data-id="'.$row->id.'" id="deleteMembroBtn">Eliminar</button>
                           
                            </div>';
        })
            ->rawColumns(['acoes'])
            ->make(true);


    }
  
}
