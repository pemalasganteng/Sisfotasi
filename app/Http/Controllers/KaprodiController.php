<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\rwdetail;
use App\semprojadwal;
use App\ruang;
use App\waktu;

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
        ->select('proposalsempro.*','u.name as nameMhs','u.nim as nimMhs','us.name as nameDosen','u.id as idMhs','proposalsempro.id as idProposalsempro')
        ->get();
        $dosenpenguji = DB::table('users')
        ->where('users.role','=','2')
        ->get();
        $ruang = DB::table('ruang')
        ->join('waktu','ruang.id','=','waktu.id_ruang')
        ->select('ruang.id as ruangId','waktu.id as waktuId','ruang.nama_ruang','waktu.sesi','waktu.jam_mulai','waktu.jam_akhir')
        ->get();
        return view('kaprodi.jadwalkansempro',compact('data','dosenpenguji','ruang'));
    }
    public function jadwalkansempro_post(Request $request){
        $request->validate([
            'penguji1' => 'required',
            'penguji2' => 'required',
            'tanggal' => 'required',
            'id_user' => 'required'
        ]);        
        $explode = explode('|',$request->ruang);
        $insert = new semprojadwal;
        $insert->id_dosen1 = $request->penguji1;
        $insert->id_dosen2 = $request->penguji2;
        $insert->tanggal = date('Y-m-d', strtotime($request->tanggal));
        $insert->id_ruang = $explode[0];
        $insert->id_waktu = $explode[1];
        $insert->id_user = $request->id_user;
        $insert->id_proposalsempro = $request->id_proposalsempro;
        $insert->save();
        
        $checker = DB::table('semprojadwal')
        ->where('semprojadwal.id_user','=',$request->id_user)
        ->select('semprojadwal.id as idSemprojadwal')
        ->get();

        $insert2 = new rwdetail;
        $insert2->id_ruang = $explode[0];
        $insert2->id_waktu = $explode[1]; 
        $insert2->tanggal = date('Y-m-d', strtotime($request->tanggal));
        $insert2->id_user = $checker[0]->idSemprojadwal;
        $insert2->save();

        return redirect()->back()->with('sukses','Berhasil Dijadwalkan'); 

    }
    public function isiruang(){
        $data = DB::table('ruang')->select('*')->get();
        $data2 = DB::table('ruang')->join('waktu','ruang.id','=','waktu.id_ruang')->get();
        return view('kaprodi.isiruang',compact('data'));

    }
    public function isiruang_post(Request $request){
        $request->validate([
            'nama_ruang' => 'required'
        ]);
        $insert = new ruang;
        $insert->nama_ruang = $request->nama_ruang;
        return redirect()->back()->with('sukses','berhasil menambahkan ruangan');

    }
    public function waktu($id){
        $ruang = DB::table('ruang')->get();
        $data = DB::table('waktu')
        ->where('waktu.id_ruang','=',$id)
        ->join('ruang','waktu.id_ruang','=','ruang.id')
        ->get();
        return view('kaprodi.waktu',compact('data','ruang'));
    }
    public function waktu_post(Request $request){
        $request->validate([
            'sesi' => 'required',
            'ruangan' => 'required',
            'time1' => 'required',
            'time2' => 'required'
        ]);
        $insert = new waktu;
        $insert->sesi = $request->sesi;
        $insert->id_ruang = $request->ruangan;
        $insert->jam_mulai = $request->time1;
        $insert->jam_akhir = $request->time2;
        $insert->save();
        return redirect()->back()->with('sukses','berhasil menambahkan waktu pada ruangan.');
    }
}
