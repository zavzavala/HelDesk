<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chamado;
use App\Models\resolve_chamados;
use App\Models\User;
use DB;
use Carbon\Carbon;

 use DataTables;
use Illuminate\Support\Facades\Auth;


    class ChamadoController extends Controller
    {
        //CHAMADOS LIST
        public function __construct()
        {
            $this->middleware('auth');
        }

        public function index(){
            return view('index');
        }

        //ADD NEW CHAMADO
        public function addChamado(Request $request){
            $validator = \Validator::make($request->all(),[
                'nome'=>'required',
                'id_user'=>'required',
                'status'=>'required',
                'data'=>'required',
                'tipo'=>'required',
                'departamento'=>'required',
                'problema'=>'required',
                //'observacao'=>'required',
            ],
            [

            'problema.required'=>'Este Campo e Obrigatorio',        
            'tipo.required'=>'Este Campo e Obrigatorio',
  
            ]);
                

            if(!$validator->passes()){
                return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
            }else{
                $chamado = new chamado();
                $chamado->id_user = $request->id_user;
                $chamado->nome = $request->nome;
                $chamado->tipo = $request->tipo;
                $chamado->departamento = $request->departamento;
                $chamado->status = $request->status;
                $chamado->data = $request->data;
                $chamado->problema = $request->problema;
                //$chamado->observacao = $request->observacao;
                
                $query = $chamado->save();

                if(!$query){
                    return response()->json(['code'=>0,'msg'=>'Ocorreu um erro.']);
                }else{
                    return response()->json(['code'=>1,'msg'=>'Chamado enviado com sucesso. Aguarde a resposta']);
                }
            }
        
    }
        // GET ALL CHAMADOS FOR USERS
        public function getChamadosList(){
            
            $id = Auth::id();
            
         $chamados = chamado::where([ ['status','pendente'],['id_user',$id] ]);
          
            return DataTables::of($chamados)
                                ->addIndexColumn()
                                ->addColumn('acoes', function($row){
                                    return '<div class="btn-group">
                                                   <button class="btn btn-sm btn-primary" data-id="'.$row['id'].'" id="editChamadoBtn">Atualizar</button>
                                                    <button class="btn btn-sm btn-danger" data-id="'.$row['id'].'" id="deleteChamadoBtn">Cancelar</button>
                                            </div>';
                                })
                                ->addColumn('checkbox', function($row){
                                    return '<input type="checkbox" name="chamado_checkbox" data-id="'.$row['id'].'"><label></label>';
                                })
                        
                                ->rawColumns(['acoes','checkbox'])
                                ->make(true);
        }
    ///GET CHAMADOS FOR ADMINISTRATION

        // GET ALL CHAMADOS FOR TABLE
        public function getAdminChamadosList(){
          //$chamados=chamado::with('user');
         $chamados = resolve_chamados::all();
//$chamados=DB::select(DB::raw("select nome, departamento, tipo, problema, STATUS, data from chamados inner join users on chamados.id_user=users.id"));
//$chamados=DB::select(DB::raw("select * from chamados"));
    
       
        
            return DataTables::of($chamados, true)
                                ->addIndexColumn()
                                ->addColumn('acoes', function($row){
                                    return '<div class="btn-group">
                                         <button class="btn btn-sm btn-success" data-id="'.$row['id'].'" id="resolveBtn">'.$row['status'].'</button>
                                         <button class="btn btn-sm btn-danger" data-id="'.$row['id'].'" id="deleteChamadoBtn">Eliminar</button>
                                          
                                  </div>';
                                })
                                ->addColumn('checkbox', function($row){
                                return '<input type="checkbox" name="chamado_checkbox" data-id="'.$row['id'].'"><label></label>';
                            })
                        
                            ->rawColumns(['acoes','checkbox'])
                            ->make(true);
    }

    // GET ALL CHAMADOS FOR TABLE PENDENTES
    public function getAdminChamadosListPendentes(){
        $chamados = resolve_chamados::where(['status'=>'pendente']);
       
      // $chamados=DB::select(DB::raw("select * from chamados inner join users on users.id=chamados.id_user where chamados.status='pendente'"));
        
        return DataTables::of($chamados)
                            ->addIndexColumn()
                            ->addColumn('acoes', function($row){
                                return '<div class="btn-group">
                                            <button class="btn btn-sm btn-success" data-id="'.$row['id'].'" id="resolveBtn">Resolver</button>
                                            
                                            </div>';
                            })
                            ->addColumn('checkbox', function($row){
                            return '<input type="checkbox" name="chamado_checkbox" data-id="'.$row['id'].'"><label></label>';
                        })
                    
                        ->rawColumns(['acoes','checkbox'])
                        ->make(true);
    }

    // GET ALL CHAMADOS FOR TABLE RESOLVIDOS
    public function getAdminChamadosListResolvidos(){
        $chamados = resolve_chamados::where(['status'=>'resolvido']);
        //$departamento =Auth::departamento();
        //$chamados =$chamado->$departamento;
        // $users = user::all();
        //$chamados=DB::select(DB::raw("select * from chamados inner join users on users.id=chamados.id_user where chamados.status='resolvido'"));
        
        return DataTables::of($chamados)
                            ->addIndexColumn()
                            ->addColumn('acoes', function($row){
                                return '<div class="btn-group">
                                            <button class="btn btn-sm btn-danger" data-id="'.$row['id'].'" id="desfazerBtn">Desfazer</button>
                                            
                                            </div>';
                            })
                            
                    
                        ->rawColumns(['acoes'])
                        ->make(true);
    }

        //GET CHAMADOS DETAILS
        public function getChamadosDetails(Request $request){
            $chamado_id = $request->chamado_id;
            $chamadoDetails = chamado::find($chamado_id);
            return response()->json(['details'=>$chamadoDetails]);
        }

        //UPDATE CHAMADOS DETAILS --USERS
        public function updateChamadoDetails(Request $request){
            $chamado_id = $request->chamaid;

            $validator = \Validator::make($request->all(),[
            // 'id'=>'unique:chamados, id,' .$chamado_id,
                'tipo'=>'required:chamados, tipo,'.$chamado_id,
                'problema'=>'required'
            
            ]);

            if(!$validator->passes()){
                return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
            }else{
                
                $chamado = chamado::find($chamado_id);
                //$chamado->nome = $request->nome;
                
                $chamado->tipo = $request->tipo;
                $chamado->problema = $request->problema;
            
                $resultado = $chamado->save();

                if($resultado){
                    return response()->json(['code'=>1, 'msg'=>'Atualizado com sucesso']);
                }else{
                    return response()->json(['code'=>0, 'msg'=>'Ocorreu um erro']);
                }
            }
        }

        // DELETE CHAMADOS RECORD USERS
        public function deleteChamado(Request $request){
            $chamado_id = $request->chamado_id;
            $query = chamado::find($chamado_id)->delete();

            if($query){
                return response()->json(['code'=>1, 'msg'=>'Eliminado com sucesso']);
            }else{
                return response()->json(['code'=>0, 'msg'=>'Algo deu errado.']);
            }
        }

        public function deleteSelectedChamados(Request $request){
            $chamado_ids = $request->chamados_ids;
            chamado::whereIn('id', $chamado_ids)->delete();
            return response()->json(['code'=>1, 'msg'=>'Chamado(s) selecionado(s) eliminado(s) com sucesso.']); 
        }

        ///////////////////////////////
        // DELETE CHAMADOS RECORD ADMIN
        public function AdmindeleteChamado(Request $request){
            $chamado_id = $request->chamado_id;
            $query = resolve_chamados::find($chamado_id)->delete();

            if($query){
                return response()->json(['code'=>1, 'msg'=>'Eliminado com sucesso']);
            }else{
                return response()->json(['code'=>0, 'msg'=>'Algo deu errado.']);
            }
        }

        public function AdmindeleteSelectedChamados(Request $request){
            $chamado_ids = $request->chamados_ids;
            resolve_chamados::whereIn('id', $chamado_ids)->delete();
            return response()->json(['code'=>1, 'msg'=>'Chamado(s) selecionado(s) eliminado(s) com sucesso.']); 
        }
    //GET CHAMADOS RESOLVER DETAILS
    public function getResolverDetails(Request $request){
        $chamado_id = $request->chamado_id;
        $chamadoDetails = resolve_chamados::find($chamado_id);
        return response()->json(['details'=>$chamadoDetails]);
    }

    //UPDATE CHAMADOS RESOLVER DETAILS
    public function resolverChamado(Request $request){
        $chamado_id = $request->chamaid;

        $validator = \Validator::make($request->all(),[
        // 'id'=>'unique:chamados, id,' .$chamado_id,
            'status'=>'required:chamados, status,'.$chamado_id,
            'userID'=>'required',
            'userName'=>'required',
            'observacao'=>'max:100',
        ],
        [
            'observacao.max'=>'Texto muito longo. So pode inserir 100 caracteres',
            //'observacao.min'=>'Texto muito curto. Tem que inserir pelomenos 10 caracteres'

        ]);

        if(!$validator->passes()){
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
        }else{
            
            $chamado = resolve_chamados::find($chamado_id);
            $chamado->userID = $request->userID;
            $chamado->userName = $request->userName;
            $chamado->observacao= $request->observacao;
            $chamado->status = $request->status;
            

            $resultado = $chamado->save();

            if($resultado){
                return response()->json(['code'=>1, 'msg'=>'Chamado Resolvido com sucesso']);
            }else{
                return response()->json(['code'=>0, 'msg'=>'Ocorreu um erro']);
            }
        }
    }

    ///////////////////////////////
    //GET TODOS CHAMADOS RESOLVER DETAILS
    public function getSelectedChamadosDetails(Request $request){
        $chamado_id = $request->chamado_id;
        $chamadoDetails = resolve_chamados::find($chamado_id);
        return response()->json(['details'=>$chamadoDetails]);
    }



    //GET CHAMADOS DESFAZER CHAMADO DETAILS
    public function getDesfazerDetails(Request $request){
        $chamado_id = $request->chamado_id;
        $chamadoDetails = resolve_chamados::find($chamado_id);
        return response()->json(['details'=>$chamadoDetails]);
    }

    //UPDATE CHAMADOS DESFAZERR DETAILS --USER
    public function desfazerChamado(Request $request){
        $chamado_id = $request->chamaid;

        $validator = \Validator::make($request->all(),[
            'userID'=>'required',
            'userName'=>'required',
            'status'=>'required:chamados, status,'.$chamado_id,
        
        ]);

        if(!$validator->passes()){
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
        }else{
            
            $chamado = resolve_chamados::find($chamado_id);
            $chamado->userID = $request->userID;
            $chamado->userName = $request->userName;
            $chamado->status = $request->status;

            $resultado = $chamado->save();

            if($resultado){
                return response()->json(['code'=>1, 'msg'=>'Chamado desfeito com sucesso']);
            }else{
                return response()->json(['code'=>0, 'msg'=>'Ocorreu um erro']);
            }
        }
    }

    }









