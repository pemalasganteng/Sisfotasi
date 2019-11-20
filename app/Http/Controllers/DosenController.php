<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\proposalsempro;

use App\tahaptaskripsi;

use Auth;

class DosenController extends Controller
{
    public function datasempro(){
    	$data = DB::table('proposalsempro')
    	->where('id_dosen',Auth::user()->id)
    	->get();
    	return view('datasempro',compact('data'));
    }
    public function datadaftarsempro($id){
        $data = DB::table('proposalsempro')
        ->where('proposalsempro.id',$id)
        ->join('users','proposalsempro.id_user', '=', 'users.id')
        ->select('proposalsempro.*','users.name','users.nim')
        ->get();
    	return view('dosen.datamhssempro',compact('data'));
    }
    public function datadaftarsempro_up(Request $request){
    	if ($request->has('verif')) {
    		$status = $request->verif;
    	}else{
    		$status = $request->dontverif;
    	}
    	$set = proposalsempro::find($request->id);
    	$set->status = $status;
    	$set->save();


        $tahap = new tahaptaskripsi;
        $tahap->status_pengajuansempro = $status ;
        $tahap->id_user = $set->id_user;
        $tahap->id_proposalsempro = $set->id;

        $tahap->save();
    	return redirect()->back()->with('sukses','Berhasil');

    }

}
