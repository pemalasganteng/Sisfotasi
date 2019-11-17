@extends('layouts.admin')

@section('content')
<div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        
                                         @if (session('sukses'))
                        <div class="alert alert-success">{{session('sukses')}}</div>
                    @endif
                                        <h4 class="header-title">Textual inputs</h4>
                                        <p class="text-muted font-14 mb-4">Silahkan menggunakan aplikasi ini sebaik-baiknya.
Jika Anda mengalami kesulitan, silahkan hubungi <code>Administrator</code>.</p>
                                        
                                        <fieldset disabled="">   
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Nama</label>
                                            <input class="form-control" type="text" value="{{$data[0]->name.' - '.$data[0]->nim}}" id="example-text-input">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Judul</label>
                                            <input class="form-control" type="text" value="{{$data[0]->judul}}" id="example-text-input">
                                        </div>
                                        <div class="form-group">
                                        <label for="example-text-input" class="col-form-label">Abstrak</label>
                                        <textarea class="form-control">{{$data[0]->abstrak}}</textarea> 
                                        </div>
                                    </fieldset>
                                        <div class="form-group">
                                        <label for="example-text-input" class="col-form-label">File</label>
                                        <a href="{{asset('filesempro/'.$data[0]->file)}}">{{$data[0]->file}}</a>
                                        </div>
                                        <div class="form-group"> 
                                        <b>{{$data[0]->status}}</b>
                                        </div>

                                        <div class="form-group"> 
                                         <form action="{{route('datadaftarsempro_up')}}" method="POST" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                         <input type="hidden" name="verif">
                                         <input type="hidden" value="{{$data[0]->id}}" name="id">
                                         <button type="submit" value="Disetujui" name="verif" class="btn btn-rounded btn-primary mb-3">Setujui</button>
                                       
                                
                                         <input type="hidden" value="Ditolak" name="dontverif">

                                         <button type="submit" class="btn btn-rounded btn-danger mb-3">Tolak</button>  
                                         </form>
                                         </div>
                                         
                                    </div>
                                </div>
                            </div>
@endsection
