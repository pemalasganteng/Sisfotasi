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
                                        <h4 class="header-title">Textual inputs</h4>
                                        <p class="text-muted font-14 mb-4">Silahkan menggunakan aplikasi ini sebaik-baiknya.
Jika Anda mengalami kesulitan, silahkan hubungi <code>Administrator</code>.</p>
                                        <form action="{{route('daftar-proposal-post')}}" method="POST" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                        <fieldset disabled="">
                                        <div class="form-group">
                                                    <label for="disabledTextInput">NIM</label>
                                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="{{Auth::user()->nim}}">
                                                </div>
                                        <div class="form-group">
                                                    <label for="disabledTextInput">Nama</label>
                                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="{{Auth::user()->name}}">
                                                </div>        
                                        </fieldset>
                                        <div class="form-group">
                                            <label class="col-form-label">Periode</label>
                                            <select name="periode" class="form-control">
                                                <option>Select</option>
                                                @foreach ($periode as $p)
                                                <option value="{{$p->id}}">{{$p->nama_periode.' - '.$p->semester}}</option>
                                                @endforeach
                                            </select>
                                        </div>  
                                         <div class="form-group">
                                                    <label for="disabledTextInput">Judul Tugas Akhir/Skripsi</label>
                                                    <input type="text" name="judul" id="disabledTextInput" class="form-control">
                                                </div>      
                                        <div class="form-group">
                                            <label class="col-form-label">Pilih Dosen Pembimbing</label>
                                            <select name="pembimbing" class="form-control">
                                                <option>Select</option>
                                                @foreach ($dosen as $d)
                                                <option value="{{$d->id}}">{{$d->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label name="abstrak" for="example-text-input" class="col-form-label">Abstrak</label>
                                            <textarea name="abstrak" class="form-control"></textarea>
                                        </div>
                                        <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Upload File</span>
                                                </div>
                                                <div class="custom-file">
                                                    <input name="file" type="file" class="custom-file-input" id="inputGroupFile01">
                                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                </div>
                                            </div>
                                         <button type="submit" class="btn btn-rounded btn-primary mb-3">Submit</button>   
                                         </form>
                                    </div>
                                </div>
                            </div>
@endsection
