@extends('layouts.admin')

@section('content')
<div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                    <li>{{$error}}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                         @if (session('sukses'))
                        <div class="alert alert-success">{{session('sukses')}}</div>
                    @endif
                                        <h4 class="header-title">Penjadwalan Sempro</h4>
                                        <p class="text-muted font-14 mb-4">Silahkan menggunakan aplikasi ini sebaik-baiknya.
Jika Anda mengalami kesulitan, silahkan hubungi <code>Administrator</code>.</p>
                                    <form action="{{route('penjadwalansempro_post')}}" method="POST" enctype="multipart/form-data">>
                                        {{csrf_field()}}
                                       <fieldset disabled="">
                                        <div class="form-group">
                                                    <label for="disabledTextInput">Nama</label>
                                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="{{$data[0]->nameMhs.' - ' . $data[0]->nimMhs}}">
                                                </div>
                                        <div class="form-group">
                                                    <label for="disabledTextInput">Judul Proposal</label>
                                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="{{$data[0]->judul}}">
                                                </div> 
                                        <div class="form-group">
                                                    <label for="disabledTextInput">Pembimbing</label>
                                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="{{$data[0]->nameDosen}}">
                                                </div>                                            
                                        </fieldset>
                                        <div class="form-group">
                                            <label class="col-form-label">Dosen Penguji 1</label>
                                            <select name="penguji1" class="custom-select">
                                                <option  selected="selected">Pilih Dosen</option>
                                                @foreach ($dosenpenguji as $d)
                                                <option value="{{$d->id}}">{{$d->name . ' - ' . $d->nim}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">Dosen Penguji 2</label>
                                            <select name="penguji2" class="custom-select">
                                                <option selected="selected">Pilih Dosen</option>
                                                @foreach ($dosenpenguji as $d)
                                                <option value="{{$d->id}}">{{$d->name . ' - ' . $d->nim}}</option>
                                                @endforeach
                                            </select>
                                        </div>       
                                        <div class="form-group">
                                            <label for="example-date-input" class="col-form-label">Tanggal</label>
                                            <input class="form-control" type="date" name="tanggal" id="example-date-input">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-form-label">Pilih Ruang dan Waktu</label>
                                            <select name="ruang" class="custom-select">
                                                <option selected="selected">Open this select menu</option>
                                                @foreach ($ruang as $r)
                                                <option value="{{$r->ruangId}}|{{$r->waktuId}}">{{$r->nama_ruang .' - Sesi '. $r->sesi . ' - ' .$r->jam_mulai . ' - ' . $r->jam_akhir}}</option>
                                                @endforeach
                                            </select>
                                        
                                        <input type="hidden" name="id_user" value="{{$data[0]->idMhs}}">
                                        <input type="hidden" name="id_proposalsempro" value="{{$data[0]->idProposalsempro}}">

                                        </div>
                                    <div class="form-group" style="float: right;">    
                                      <button type="submit" class="btn btn-rounded btn-success mb-3">Jadwalkan</button>  
                                    </div> 

                                    </form>
                                    </div>
                                </div>
                            </div>
@endsection
