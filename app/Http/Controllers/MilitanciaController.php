<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CartaoMembro;
use App\Models\Membro;
use App\Models\Militancia;
use Yajra\DataTables\DataTables;

use Illuminate\Http\Request;

class MilitanciaController extends Controller
{
    
    public function index()
    {
        $membros = Membro::all();
        return view('dashboards.Militancia.militancia', compact('membros'));
    }

    public function getMilitancia(){

        $militancia = Militancia::with('membro')->get();

        return DataTables::of($militancia)
        ->addIndexColumn()
        ->addColumn('acoes', function($row){
            return '<div class="btn-group">
                            <button class="btn btn-sm btn-primary" data-id="'.$row['id'].'" id="editMilitanciaBtn">Editar</button>
                            <button class="btn btn-sm btn-danger" data-id="'.$row['id'].'" id="deleteMilitanciaBtn">Eliminar</button>
                           
                            </div>';
        })
            ->rawColumns(['acoes'])
            ->make(true);
        //return view('dashboards.Membros.ver_membros', compact('membro'));

    }
    public function create()
    {
        $membros = Membro::all();
        //$cartao_membro = CartaoMembro::all();
        
        return view('dashboards.Militancia.militancia', compact('membros'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(),[
            'membro_id' => 'required|unique:militancia,membro_id',
            'situacao_membro' => 'required|string',
            'funcao_celula' => 'required|string',
            'celula' => 'required|string',
            'data_ingresso' => 'required|date',
        ]);

        if(!$validator->passes()){
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
        }else{
            
            $sucesso = Militancia::create($request->all());

            if(!$sucesso){
                return response()->json(['code'=>0,'msg'=>'Ocorreu um erro.']);
            }else{
                return response()->json(['code'=>1,'msg'=>'Cartão de membro emitido com sucesso!']);
            }

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function MilitanciaDetalhes(Request $request)
    {
        $militancia_id = $request->militancia_id;
        $militanciaDetalhes = Militancia::find($militancia_id);
        return response()->json(['details'=>$militanciaDetalhes]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateMilitancia (Request $request)
    {
        $id = $request->militancia_id;
        $membro_id = $request->membro_id;
      
        $validator = \Validator::make($request->all(),[
            'membro_id' => 'required|unique:militancia,membro_id,' .$id,
            'situacao_membro' => 'required|string',
            'funcao_celula' => 'required|string',
            'celula' => 'required|string',
            'data_ingresso' => 'required|date',
        ]);

        if(!$validator->passes()){
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
        }else{
            
           $militancia = Militancia::find($id);

           $militancia->membro_id = $request->membro_id;
           $militancia->data_ingresso = $request->data_ingresso;
           $militancia->situacao_membro = $request->situacao_membro;
           $militancia->funcao_celula = $request->funcao_celula;
           $militancia->celula = $request->celula;

           $sucesso = $militancia->save();

            if(!$sucesso){
                return response()->json(['code'=>0,'msg'=>'Ocorreu um erro.']);
            }else{
                return response()->json(['code'=>1,'msg'=>'Cartão de membro aletrado com sucesso!']);
            }

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request){

        $militancia_id = $request->militancia_id;
        $query = Militancia::find($militancia_id)->delete();

        if($query){
            return response()->json(['code'=>1, 'msg'=>'Eliminado com sucesso']);
        }else{
            return response()->json(['code'=>0, 'msg'=>'Algo deu errado.']);
        }

    }

}
