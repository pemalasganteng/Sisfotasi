<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class KaprodiController extends Controller
{
    //
    public function datasempro(){
    	$data = DB::table('proposalsempro' )
    	->where('status','=','Disetujui')
    	->join('users AS u','proposalsempro.id_user','=','u.id')
    	->join('users AS us','proposalsempro.id_dosen','=','us.id')
    	->select('proposalsempro.*','u.name as nameMhs','u.nim as nimMhs','us.name as nameDosen')
    	->get();
    	return view('kaprodi.datasempro',compact('data'));
    	
    }
    public function penjadwalansempro(Request $Request){
        $data = DB::table('proposalsempro')
        ->where('proposalsempro.id','=',$Request->id)
        ->join('users AS u','proposalsempro.id_user','=','u.id')
        ->join('users AS us','proposalsempro.id_dosen','=','us.id')
        ->select('proposalsempro.*','u.name as nameMhs','u.nim as nimMhs','us.name as nameDosen')
        ->get();
        $dosenpenguji = DB::table('users')
        ->where('users.role','=','2')
        ->get();
        $ruang = DB::table('ruang')
        ->join('waktu','ruang.id','=','waktu.id_ruang')
        ->get();
        return view('kaprodi.jadwalkansempro',compact('data','dosenpenguji','ruang'));
    }
}
