@extends('layouts.admin')
@section('content')
<div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Thead info</h4>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table text-center">
                                            <thead class="text-uppercase bg-info">
                                                <tr class="text-white">
                                                    <th scope="col">NO</th>
                                                    <th scope="col">Tanggal Pengajuan</th>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">Pembimbing</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($data as $d)

                                                
                                                <tr>
                                                    <th scope="row">{{$loop->iteration}}</th>
                                                    <td>{{date('d-m-Y H:i:s',strtotime($d->created_at))}}</td>
                                                    <td>{{$d->nameMhs}}<br>{{$d->nimMhs}}</td>
                                                    
                                                    <td>{{$d->nameDosen}}</td>
                                                    <td>{{$d->status}}<br>{{$d->updated_at}}</i></td>
                                                    <td><a href="{{route('penjadwalansempro',['id' => $d->id])}}"><button class="btn btn-rounded btn-info mb-3">Jadwalkan</button></a></td>
                                                </tr>
                                                

                                                
                                                @endforeach
                                                <!-- Modal -->

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
@endsection