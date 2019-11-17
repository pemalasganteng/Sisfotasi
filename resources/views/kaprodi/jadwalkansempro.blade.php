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
                                            <select class="custom-select">
                                                <option selected="selected">Pilih Dosen</option>
                                                @foreach ($dosenpenguji as $d)
                                                <option value="">{{$d->name . ' - ' . $d->nim}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">Dosen Penguji 2</label>
                                            <select class="custom-select">
                                                <option selected="selected">Pilih Dosen</option>
                                                @foreach ($dosenpenguji as $d)
                                                <option value="">{{$d->name . ' - ' . $d->nim}}</option>
                                                @endforeach
                                            </select>
                                        </div>       
                                        <div class="form-group">
                                            <label for="example-date-input" class="col-form-label">Tanggal</label>
                                            <input class="form-control" type="date" value="2018-03-05" id="example-date-input">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-form-label">Custom Select</label>
                                            <select class="custom-select">
                                                <option selected="selected">Open this select menu</option>
                                                @foreach ($ruang as $r)
                                                <option value="">{{$r->nama_ruang .' - Sesi '. $r->sesi}}</option>
                                                @endforeach
                                            </select>
                                        
    

                                        </div>
                                    <div class="form-group" style="float: right;">    
                                      <button type="button" class="btn btn-rounded btn-success mb-3">Jadwalkan</button>  
                                    </div>  
                                    </div>
                                </div>
                            </div>
@endsection
