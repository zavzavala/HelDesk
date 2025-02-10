<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CartaoMembro;
use App\Models\Membro;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class CartaoMembroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $membro = Membro::with('membro')->get();
        
        return view('dashboards.Cartao_membro.cartao_membro');
        
    }

    public function getCartao(){

        $membro = DB::table('cartao_membros')
        ->leftJoin('membros', 'cartao_membros.membro_id', '=','membros.id')
        ->select('membros.nome','membros.apelido','membros.sexo','cartao_membros.id','cartao_membros.data_emissao', 'cartao_membros.numero')
          ->get();
        return DataTables::of($membro)
        ->addIndexColumn()
        ->addColumn('acoes', function($row){
            return '<div class="btn-group">
                            <button class="btn btn-sm btn-primary" data-id="'.$row->id.'" id="editCartaoBtn">Editar</button>
                            <button class="btn btn-sm btn-danger" data-id="'.$row->id.'" id="deleteCartaoBtn">Eliminar</button>
                           
                            </div>';
        })
            ->rawColumns(['acoes'])
            ->make(true);
        //return view('dashboards.Membros.ver_membros', compact('membro'));

    }
    public function create()
    {  
       
        $membros = Membro::all();
       
        return view('dashboards.Cartao_membro.cartao_membro', compact('membros'));
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
            'membro_id' => 'required|exists:membros,id|unique:cartao_membros,membro_id',
            'numero' => 'required|string|unique:cartao_membros,numero',
            'data_emissao' => 'required|date',
        ],[
            'membro_id.required'=>'Selecione o membro'
        ]);

        if(!$validator->passes()){
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
        }else{
            $sucesso = CartaoMembro::create($request->all());

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
    public function CartaoDetalhes(Request $request)
    {
        $cartao_id = $request->cartao_id;
        $CartaoDetalhes = CartaoMembro::find($cartao_id);
        return response()->json(['details'=>$CartaoDetalhes]);

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateCartao(Request $request)
    {
        $id = $request->cartao_id;
        $numero = $request->numero;
        $membro_id = $request->membro_id;
       
        $validator = \Validator::make($request->all(),[
            'membro_id' => 'required|unique:cartao_membros,membro_id,'.$id,
            'numero' => 'required|string|unique:cartao_membros,numero,' .$id,
            'data_emissao' => 'required|date',
        ]);

        if(!$validator->passes()){
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
        }else{

            $cartao = CartaoMembro::find($id);
            $cartao->membro_id = $request->membro_id;
            $cartao->numero = $request->numero;
            $cartao->data_emissao = $request->data_emissao;

            $sucesso = $cartao->save();

            if(!$sucesso){
                return response()->json(['code'=>0,'msg'=>'Ocorreu um erro.']);
            }else{
                return response()->json(['code'=>1,'msg'=>'Cartão de membro emitido com sucesso!']);
            }

        }
    }

   
    public function destroy(Request $request)
    {
      
        $cartao_id = $request->cartao_id;
        $query = CartaoMembro::find($cartao_id)->delete();

        if($query){
            return response()->json(['code'=>1, 'msg'=>'Eliminado com sucesso']);
        }else{
            return response()->json(['code'=>0, 'msg'=>'Algo deu errado.']);
        }
    }
}
