<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\proposalsempro;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $dosen = DB::table('proposalsempro')
        ->where('id_dosen',Auth::user()->id)
        ->join('users','proposalsempro.id_user', '=', 'users.id')
        ->select('proposalsempro.*','users.name','users.nim')
        ->get();
        return view('home',compact('dosen'));
    }
    public function daftar_proposal(){
        $dosen = DB::table('users')->where('role','2')->get();
        $periode = DB::table('periode')->where('status','buka')->get();
        return view('daftar_proposal',compact('dosen','periode'));
    }
    public function daftar_proposal_post(Request $request){
        $request->validate([
            'judul' => 'required',
            'pembimbing' => 'required',
            'file' => 'required|mimes:pdf|max:10000',
            'abstrak' => 'required|max:500'
        ]);
        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();
        $name = md5($file->getClientOriginalName());
        $path = $file->move('filesempro',$name.'.'.$extension);
        $daftar = new proposalsempro;
        $daftar->judul = $request->judul;
        $daftar->abstrak = $request->abstrak;
        $daftar->id_dosen = $request->pembimbing;
        $daftar->id_user = Auth::User()->id;
        $daftar->file = $name.'.'.$extension;
        $daftar->id_periode = $request->periode;
        $daftar->status = "Belum Disetujui";
        $daftar->save();
        return redirect()->back()->with('sukses','File Seminar Proposal Berhasil Ditambah...');
    }
    public function sempro(){
        $sempro = DB::table('proposalsempro')
        ->where('proposalsempro.id_user',Auth::user()->id)
        ->join('semprojadwal','proposalsempro.id','=','semprojadwal.id_proposalsempro')
        ->select('proposalsempro.*','semprojadwal.id as idSemprojadwal')
        ->get();

        
        $sempro1 = DB::table('proposalsempro')
        ->where('proposalsempro.id_user',Auth::user()->id)
        // ->join('semprojadwal','proposalsempro.id','=','semprojadwal.id_proposalsempro')
        ->select('proposalsempro.*')
        ->get();
        
        return view('sempro',compact('sempro','sempro1'));

    }
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
    public function detail_jadwalsempro($id){
        $data = DB::table('semprojadwal')
        ->where('id_proposalsempro',$id)
        ->join('users as dosen1','semprojadwal.id_dosen1','=','dosen1.id')
        ->join('users as dosen2','semprojadwal.id_dosen2','=','dosen2.id')
        ->join('proposalsempro','semprojadwal.id_proposalsempro','=','proposalsempro.id')
        ->join('ruang','semprojadwal.id_ruang','=','ruang.id')
        ->join('waktu','semprojadwal.id_waktu','=','waktu.id')
        ->select('semprojadwal.*','dosen1.name as namaDosen1','dosen2.name as namaDosen2','dosen1.nim as nimDosen1','dosen2.nim as nimDosen2','ruang.*','waktu.*')
        ->get();

        
        $data2 = DB::table('proposalsempro')->where('proposalsempro.id',$id)
        // ->join('users','proposalsempro.id_dosen','=','users.id')
        ->join('users as p','proposalsempro.id_dosen','=','p.id')
        ->join('users','proposalsempro.id_user','=','users.id')
        ->select('proposalsempro.*','users.name','users.nim','p.name as nameDosen','p.nim as nimDosen')
        ->get();
        return view('mahasiswa.jadwalsempro',compact('data','data2'));

    }
}


