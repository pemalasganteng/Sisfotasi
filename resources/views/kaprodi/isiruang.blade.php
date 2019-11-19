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
                                    <form action="{{route('isiruang_post')}}" method="POST" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                       
                                        <div class="form-group">
                                                    <label for="disabledTextInput">Nama Ruang</label>
                                                    <input type="text" id="disabledTextInput" class="form-control" name="nama_ruang">
                                                </div>
                                         
                                   

                                       
                                    <div class="form-group">    
                                      <button type="submit" class="btn btn-rounded btn-success mb-3">Tambah</button>  
                                    </div> 

                                    </form>
                                    <div class="card-body">
                                <h4 class="header-title">Data Ruangan</h4>
                                <div style="width: 50%; float: center;" class="single-table">
                                    <div class="table-responsive">
                                        <table class="table text-center">
                                            <thead class="text-uppercase bg-danger">
                                                <tr class="text-white">
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Nama Ruangan</th>
                                                    <th scope="col">action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $d)
                                                <tr>
                                                    
                                                    <th scope="row">{{$loop->iteration}}</th>
                                                    <td>{{$d->nama_ruang}}</td>
                                                    <td><a href="{{route('waktu',['id' => $d->id])}}"><i class="ti-eye"></i></a></td>
                                                    
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                                    </div>
                                </div>
                            </div>
@endsection
