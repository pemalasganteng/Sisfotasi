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
        $sempro = DB::table('proposalsempro')->where('id_user',Auth::user()->id)->get();
        return view('sempro',compact('sempro'));
    }
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
