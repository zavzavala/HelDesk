<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chamado;
use App\Models\resolve_chamados;
use App\Models\User;
use DB;
use Carbon\Carbon;


class ChartController extends Controller
{
    public function uplot()
    {
        $users=user::paginate(4);
        
        $chamados=resolve_chamados::with('User')
           ->whereYear("data", date('Y'))
           ->whereMonth("data", date('m'))
           ->where('status', 'pendente')
           ->limit('3')
           ->get();
           $resolvidos=DB::select(DB::raw("select count(*) as total from resolve_chamados where status='resolvido'"));

           $cont=DB::select(DB::raw("select count(*) as total from resolve_chamados where MONTH(data) = MONTH(NOW()) AND YEAR(data)=YEAR(NOW()) AND status='pendente'"));

                    $result=DB::select(DB::raw("select count(*) as total_chamado, departamento from resolve_chamados where status='resolvido' group by departamento"));

                    $chartData="";
                    foreach($result as $list){
                        $chartData.="['".$list->departamento."', ".$list->total_chamado."],";
                    }
                    $loop['chartData']=rtrim($chartData, ",");
                   //dd($loop);

    	return view('dashboards.admins.uplot', $loop,compact('users', 'chamados','cont', 'resolvidos'));
    }

///////Grafico de linhas
public function linhas()
{
    $users=user::paginate(4);
    
    $chamados=resolve_chamados::with('User')
       ->whereYear("data", date('Y'))
       ->whereMonth("data", date('m'))
       ->where('status', 'pendente')
       ->limit('3')
       ->get();

       $cont=DB::select(DB::raw("select count(*) as total from resolve_chamados where MONTH(data) = MONTH(NOW()) AND YEAR(data)=YEAR(NOW()) AND status='pendente'"));

                $result=DB::select(DB::raw("select count(*) as total_chamado, tipo from resolve_chamados where status='resolvido' group by tipo"));

                $chartData="";
                foreach($result as $list){
                    $chartData.="['".$list->tipo."', ".$list->total_chamado."],";
                }
                $loop['chartData']=rtrim($chartData, ",");
               // dd($loop);

    return view('dashboards.admins.linha', $loop,compact('users', 'chamados','cont'));
}



//////////////Grafico flot

public function flot()
{
    $users=user::paginate(4);
    
     
    $chamados=resolve_chamados::with('User')
       ->whereYear("data", date('Y'))
       ->whereMonth("data", date('m'))
       ->where('status', 'pendente')
       ->limit('3')
       ->get();

       $cont=DB::select(DB::raw("select count(*) as total from resolve_chamados where MONTH(data) = MONTH(NOW()) AND YEAR(data)=YEAR(NOW()) AND status='pendente'"));

                $result=DB::select(DB::raw("select count(*) as total_chamado, tipo from resolve_chamados where status='resolvido' group by tipo"));

                $chartData="";
                foreach($result as $list){
                    $chartData.="['".$list->tipo."', ".$list->total_chamado."],";
                }
                $loop['chartDataf']=rtrim($chartData, ",");
               //dd($loop);

    return view('dashboards.admins.flot', $loop, compact('users', 'chamados','cont'));
}




}
