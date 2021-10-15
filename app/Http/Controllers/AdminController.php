<?php

namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Auth;
    use App\Models\User;
    use App\Models\chamado;
    use App\Models\resolve_chamados;
    use DB;
    use DataTables;

   // use Illuminate\Support\Facades\DB;
    use Carbon\Carbon;
    class AdminController extends Controller
    {
        function index(){
            $users=user::paginate(4);
           // $chamados=chamado::paginate(4);
           //$chamados=chamado::with('User')
          /* $chamados=chamado::with('user')
           ->whereYear("data", date('Y'))
           ->whereMonth("data", date('m'))
           ->where('status', 'pendente')
           ->limit('3')
           ->get();*/
           
           $chamados=DB::select(DB::raw("select * from resolve_chamados where status='pendente' "));
  
           
                $cont=DB::select(DB::raw("select count(*) as total from resolve_chamados where YEAR(data)=YEAR(NOW()) AND MONTH(data) = MONTH(NOW()) AND status='pendente'"));

            $resolvidos=DB::select(DB::raw("select count(*) as total from resolve_chamados where status='resolvido'"));

            $result=DB::select(DB::raw("select count(*) as total_chamado, tipo from resolve_chamados where status='resolvido' group by tipo"));

            $chartData="";
            foreach($result as $list){
                $chartData.="['".$list->tipo."', ".$list->total_chamado."],";
            }
            $loop['chartData']=rtrim($chartData, ",");
           // dd($loop);
            return view('dashboards.admins.index',$loop, compact('users', 'chamados', 'cont', 'resolvidos'));
        }
        
        function profile(){
            $users=user::paginate(4);
            //$chamados=chamado::paginate(4);
            $chamados=resolve_chamados::with('User')
            //$chamados=RelUser::with('User')
           ->whereYear("data", date('Y'))
           ->whereMonth("data", date('m'))
           ->where('status', 'pendente')
           ->limit('3')
           ->get();
           $cont=DB::select(DB::raw("select count(*) as total from resolve_chamados where YEAR(data)=YEAR(NOW()) AND MONTH(data) = MONTH(NOW()) AND status='pendente'"));

            $resolvidos=DB::select(DB::raw("select count(*) as total from resolve_chamados where status='resolvido'"));

            $result=DB::select(DB::raw("select count(*) as total_chamado, tipo from resolve_chamados where status='resolvido' group by tipo"));

            $chartData="";
            foreach($result as $list){
                $chartData.="['".$list->tipo."', ".$list->total_chamado."],";
            }
            $loop['chartData']=rtrim($chartData, ",");
           // dd($loop);
            return view('dashboards.admins.profile',$loop, compact('users', 'chamados', 'cont', 'resolvidos'));
        }
        function settings(){
            $users=user::paginate(4);
            $chamados=resolve_chamados::with('User')
           ->whereYear("data", date('Y'))
           ->whereMonth("data", date('m'))
           ->where('status', 'pendente')
           ->limit('3')
           ->get();
           $cont=DB::select(DB::raw("select count(*) as total from resolve_chamados where YEAR(data)=YEAR(NOW()) AND MONTH(data) = MONTH(NOW()) AND status='pendente'"));

            $resolvidos=DB::select(DB::raw("select count(*) as total from resolve_chamados where status='resolvido'"));

            $result=DB::select(DB::raw("select count(*) as total_chamado, tipo from resolve_chamados where status='resolvido' group by tipo"));

            $chartData="";
            foreach($result as $list){
                $chartData.="['".$list->tipo."', ".$list->total_chamado."],";
            }
            $loop['chartData']=rtrim($chartData, ",");
           // dd($loop);
            return view('dashboards.admins.settings', $loop, compact('users', 'chamados', 'cont','resolvidos'));
        }


        function calendar(){
            $users=user::paginate(4);
            //$chamados=chamado::paginate(4);
            $chamados=resolve_chamados::with('user')
           ->whereYear("data", date('Y'))
           ->whereMonth("data", date('m'))
           ->where('status', 'pendente')
           ->limit('3')
           ->get();
           $cont=DB::select(DB::raw("select count(*) as total from resolve_chamados where YEAR(data)=YEAR(NOW()) AND MONTH(data) = MONTH(NOW()) AND status='pendente'"));


                    $resolvidos=DB::select(DB::raw("select count(*) as total from resolve_chamados where status='resolvido'"));

                    $result=DB::select(DB::raw("select count(*) as total_chamado, tipo from resolve_chamados where status='resolvido' group by tipo"));

                    $chartData="";
                    foreach($result as $list){
                        $chartData.="['".$list->tipo."', ".$list->total_chamado."],";
                    }
                    $loop['chartData']=rtrim($chartData, ",");
                   // dd($loop);
            return view('dashboards.admins.calendar',$loop, compact('users', 'chamados', 'cont', 'resolvidos'));
        }
        function chartJs(){
            $users=user::paginate(4);
            //$chamados=chamado::paginate(4);
            $chamados=resolve_chamados::with('user')
           ->whereYear("data", date('Y'))
           ->whereMonth("data", date('m'))
           ->where('status', 'pendente')
           ->limit('3')
           ->get();
           $cont=DB::select(DB::raw("select count(*) as total from resolve_chamados where YEAR(data)=YEAR(NOW()) AND MONTH(data) = MONTH(NOW()) AND status='pendente'"));

            return view('dashboards.admins.chartJs', compact('users', 'chamados', 'cont'));
        }


        function data(){
            $users=user::paginate(4);
            //$chamados=chamado::paginate(4)
            $chamados=resolve_chamados::with('user')
           ->whereYear("data", date('Y'))
           ->whereMonth("data", date('m'))
           ->where('status', 'pendente')
           ->limit('3')
           ->get();
                //dd($chamados);
               $cont=DB::select(DB::raw("select count(*) as total from resolve_chamados where YEAR(data)=YEAR(NOW()) AND MONTH(data) = MONTH(NOW()) AND status='pendente'"));


            $resolvidos=DB::select(DB::raw("select count(*) as total from resolve_chamados where status='resolvido'"));

            $result=DB::select(DB::raw("select count(*) as total_chamado, tipo from resolve_chamados where status='resolvido' group by tipo"));

            $chartData="";
            foreach($result as $list){
                $chartData.="['".$list->tipo."', ".$list->total_chamado."],";
            }
            $loop['chartData']=rtrim($chartData, ",");
           // dd($loop);
            return view('dashboards.admins.data',$loop, compact('users', 'chamados', 'cont', 'resolvidos'));
        }
        function flot(){
            $users=user::paginate(4);
            //$chamados=chamado::paginate(4);
            $chamados=resolve_chamados::with('user')
           ->whereYear("data", date('Y'))
           ->whereMonth("data", date('m'))
           ->where('status', 'pendente')
           ->limit('3')
           ->get();
           $cont=DB::select(DB::raw("select count(*) as total from resolve_chamados where YEAR(data)=YEAR(NOW()) AND MONTH(data) = MONTH(NOW()) AND status='pendente'"));

            $resolvidos=DB::select(DB::raw("select count(*) as total from resolve_chamados where status='resolvido'"));

            $result=DB::select(DB::raw("select count(*) as total_chamado, tipo from resolve_chamados where status='resolvido' group by tipo"));

                $chartData="";
                foreach($result as $list){
                    $chartData.="['".$list->tipo."', ".$list->total_chamado."],";
                }
                $loop['chartData']=rtrim($chartData, ",");
               //dd($loop);
            return view('dashboards.admins.flot',$loop, compact('users', 'chamados', 'cont', 'resolvidos'));
        }

        function resolvidos(){
            $users=user::paginate(4);
            //$chamados=chamado::paginate(4);
            $chamados=resolve_chamados::with('user')
            ->whereYear("data", date('Y'))
            ->whereMonth("data", date('m'))
            ->where('status', 'pendente')
            ->limit('3')
            ->get();
            $cont=DB::select(DB::raw("select count(*) as total from resolve_chamados where YEAR(data)=YEAR(NOW()) AND MONTH(data) = MONTH(NOW()) AND status='pendente'"));
 
             $resolvidos=DB::select(DB::raw("select count(*) as total from resolve_chamados where status='resolvido'"));
 
             $result=DB::select(DB::raw("select count(*) as total_chamado, tipo from resolve_chamados where status='resolvido' group by tipo"));
 
            $chartData="";
            foreach($result as $list){
                $chartData.="['".$list->tipo."', ".$list->total_chamado."],";
            }
            $loop['chartData']=rtrim($chartData, ",");
           // dd($loop);
        return view('dashboards.admins.resolvidos',$loop, compact('users', 'chamados', 'cont', 'resolvidos'));
    }
    function linhas(){
        $users=user::paginate(4);
       //$chamados=chamado::paginate(4);
       $chamados=resolve_chamados::with('user')
       ->whereYear("data", date('Y'))
       ->whereMonth("data", date('m'))
       ->where('status', 'pendente')
       ->limit('3')
       ->get();
       $cont=DB::select(DB::raw("select count(*) as total from resolve_chamados where YEAR(data)=YEAR(NOW()) AND MONTH(data) = MONTH(NOW()) AND status='pendente'"));

        $resolvidos=DB::select(DB::raw("select count(*) as total from resolve_chamados where status='resolvido'"));

        $result=DB::select(DB::raw("select count(*) as total_chamado, tipo from resolve_chamados where status='resolvido' group by tipo"));

                $chartData="";
                foreach($result as $list){
                    $chartData.="['".$list->tipo."', ".$list->total_chamado."],";
                }
                $loop['chartData']=rtrim($chartData, ",");
               //dd($loop);
        return view('dashboards.admins.linha', $loop,compact('users', 'chamados', 'cont', 'resolvidos'));
    }
    
    function uplot(){
        $users=user::paginate(4);
       //$chamados=chamado::paginate(4);
       $chamados=resolve_chamados::with('user')
       ->whereYear("data", date('Y'))
       ->whereMonth("data", date('m'))
       ->where('status', 'pendente')
       ->limit('3')
       ->get();
       $cont=DB::select(DB::raw("select count(*) as total from resolve_chamados where YEAR(data)=YEAR(NOW()) AND MONTH(data) = MONTH(NOW()) AND status='pendente'"));

        $resolvidos=DB::select(DB::raw("select count(*) as total from resolve_chamados where status='resolvido'"));

        $result=DB::select(DB::raw("select count(*) as total_chamado, tipo from resolve_chamados where status='resolvido' group by tipo"));

                $chartData="";
                foreach($result as $list){
                    $chartData.="['".$list->tipo."', ".$list->total_chamado."],";
                }
                $loop['chartData']=rtrim($chartData, ",");
              // dd($loop);
        return view('dashboards.admins.uplot',$loop, compact('users', 'chamados', 'cont', 'resolvidos'));
    }
    function widgets(){
        $users=user::paginate(4);
        //$chamados=chamado::paginate(4);
        $chamados=resolve_chamados::with('user')
        ->whereYear("data", date('Y'))
        ->whereMonth("data", date('m'))
        ->where('status', 'pendente')
        ->limit('3')
        ->get();
        $cont=DB::select(DB::raw("select count(*) as total from resolve_chamados where YEAR(data)=YEAR(NOW()) AND MONTH(data) = MONTH(NOW()) AND status='pendente'"));

         $resolvidos=DB::select(DB::raw("select count(*) as total from resolve_chamados where status='resolvido'"));

         $result=DB::select(DB::raw("select count(*) as total_chamado, tipo from resolve_chamados where status='resolvido' group by tipo"));
         $widgets=DB::select(DB::raw("select count(*) as todos, tipo,status from `resolve_chamados` group by tipo, status"));
        
                        $chartData="";
                        foreach($result as $list){
                            $chartData.="['".$list->tipo."', ".$list->total_chamado."],";
                        }
                        $loop['chartData']=rtrim($chartData, ",");
                       //dd($loop);
       //dd($widgets);

        return view('dashboards.admins.widgets',$loop, compact('users', 'chamados', 'cont','widgets', 'resolvidos'));
    }

        function updateInfo(Request $request){
            
                $validator = \Validator::make($request->all(),[
                    'name'=>'required',
                    'email'=> 'required|email|unique:users,email,'.Auth::user()->id,
                    'favoritecolor'=>'required',
                    'departamento'=>'required',
                ],
                [
                    'name.required'=>'O campo nome é obrigatorio',
                    'email.required'=>'O campo email é obrigatorio',
                    'email.email'=>'Este email não é valido',
                    'email.unique'=>"Este email ja esta sendo usado",
                    'favoritecolor.required'=>'O campo Cor favorita é obrigatorio',
                    'departamento.required'=>'O campo departamento é obrigatorio'
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
                            return response()->json(['status'=>1,'msg'=>'Seus dados foram atualizados com sucesso.']);
                        }
                }
        }

        function updatePicture(Request $request){
            $path = 'users/images/';
            $file = $request->file('admin_image');
            $new_name = 'UIMG_'.date('Ymd').uniqid().'.jpg';

            //Upload new image
            $upload = $file->move(public_path($path), $new_name);
            
            if( !$upload ){
                return response()->json(['status'=>0,'msg'=>'Ocorreu um erro ao tentar carregar foto.']);
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
                    return response()->json(['status'=>0,'msg'=>'Ocorreu um erro ao tentar alterar foto.']);
                }else{
                    return response()->json(['status'=>1,'msg'=>'Sua foto foi alterada com sucesso.']);
                }
            }
        }


        function changePassword(Request $request){
            //Validate form
            $validator = \Validator::make($request->all(),[
                'oldpassword'=>[
                    'required', function($attribute, $value, $fail){
                        if( !\Hash::check($value, Auth::user()->password) ){
                            return $fail(__('Palavra-passe atual esta incorreta.'));
                        }
                    },
                    'min:8',
                    'max:30'
                    ],
                    'newpassword'=>'required|min:8|max:30',
                    'cnewpassword'=>'required|same:newpassword'
                ],[
                    'oldpassword.required'=>'Insira a palavra-passe antiga.',
                    'oldpassword.min'=>'palavra-passe devem ter no mínimo oito caractéres.',
                    'oldpassword.max'=>'palavra-passe antiga não deve ter mais de 30 caractéres.',
                    'newpassword.required'=>'Insira a nova palavra-passe.',
                    'newpassword.min'=>'Nova palavra-passe deve ter no mínimo oito caractéres.',
                    'newpassword.max'=>'Nova palavra-passe não deve ter mais de 30 caractéres.',
                    'cnewpassword.required'=>'Repita a nova palavra-passe.',
                    'cnewpassword.same'=>'Nova palavra-passe e antiga devem coresponderem.'
                ]);

            if( !$validator->passes() ){
                return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
            }else{
                    
                $update = User::find(Auth::user()->id)->update(['password'=>\Hash::make($request->newpassword)]);

                if( !$update ){
                    return response()->json(['status'=>0,'msg'=>'Ocorreu um problema ao tentar alterar Palavra-passe.']);
                }else{
                    return response()->json(['status'=>1,'msg'=>'Palavra-passe alterada com sucesso']);
                }
            }
        }

        // GET ALL USERS
    public function getUsers(){
        $users = User::all();
       //$users= DB::select(DB::raw("select * from users"));
        
            return DataTables::of($users)
                                ->addIndexColumn()
                                ->addColumn('acoes', function($row){
                                 return '<div class="btn-group">
                                 <button class="btn btn-sm btn-primary" data-id="'.$row['id'].'" id="permissoes">Admin</button>
                                 <button class="btn btn-sm btn-danger" data-id="'.$row['id'].'" id="removeUser">Eliminar</button>
                                
                                  </div>';
              })
              ->rawcolumns(['acoes'])
              
              ->make(true);
                          //  dd($users);
    }
 
       
     // DELETE USERS RECORD
     public function deleteUser(Request $request){
         $user_id = $request->user_id;
         $query = User::find($user_id)->delete();
 
         if($query){
             return response()->json(['code'=>1, 'msg'=>'Usuario Eliminado com sucesso']);
         }else{
             return response()->json(['code'=>0, 'msg'=>'Falha ao tentar eliminar usuario.']);
         }
     }

     //GET USERSINFO DETAILS
    public function getInfoAdminDetails(Request $request){
        $id_user = $request->admin_id;
        $UserInfoDetails = User::find($id_user);
        return response()->json(['details'=>$UserInfoDetails]);
    }

    function updateInfoToADMIN(Request $request){
            $id_user=$request->id_user;
        $validator = \Validator::make($request->all(),[
           
            'role'=> 'required:users,role,'.$id_user,
            'role'=>'required',
            
            
        
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
        }else{
                $query = User::find($id_user)->update([
                    'role'=>$request->role,
                    //"role"=>json_encode($this->role),
                ]);
               /* $query = User::find($id_user);

                $query-> role = $request->role;

                $sucesso=$query->save();*/


                if(!$query){
                    return response()->json(['status'=>0,'msg'=>'Ocorreu um erro.']);
                }else{
                    return response()->json(['status'=>1,'msg'=>'Atualizado com sucesso.']);
                }
        }
}

    }
