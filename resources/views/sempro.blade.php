@extends('layouts.admin')

@section('content')

<div class="col-lg-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Pengajuan Seminar Proposal</h4>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table text-center">
                                            <thead class="text-uppercase bg-dark">
                                                <tr class="text-white">
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Judul</th>
                                                    <th scope="col">Abstrak</th>
                                                    <th scope="col">Dokumen File</th>
                                                    <th scope="col">Tanggal Pengajuan</th>
                                                    <th scope="col">Status Diterima</th>
                                                    <th scope="col">Status Terjadwal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                               @if (is_null($sempro))
                                               <tr>
                                                    @foreach ($sempro1 as $d)
                                                    <th scope="row">1</th>
                                                    <td>{{$d->judul}}</td>
                                                    <td>{{$d->abstrak}}</td>
                                                    <td><a href="{{asset('filesempro/'.$d->file)}}"> {{$d->file}}</a></td>
                                                    <td>{{date('d/m/Y', strtotime($s->created_at))}}</td>
                                                    <td>
                                                        @if($s->status == 'Belum Disetujui')
                                                        <i class="fa fa-minus"></i>
                                                        @elseif($s->status == 'Disetujui')
                                                        <i class="fa fa-check"></i>
                                                        @elseif($s->status == 'Ditolak')
                                                        <i class="fa fa-close"></i>
                                                        @endif
                                                    </td>
                                                    <td>Belum Terjadwal</td>
                                                    @endforeach
                                                </tr>
                                               
                                               @elseif (!is_null($sempro))
                                                <tr>
                                                	@foreach ($sempro as $s)
                                                    <th scope="row">1</th>
                                                    <td>{{$s->judul}}</td>
                                                    <td>{{$s->abstrak}}</td>
                                                    <td><a href="{{asset('filesempro/'.$s->file)}}"> {{$s->file}}</a></td>
                                                    <td>{{date('d/m/Y', strtotime($s->created_at))}}</td>
                                                    <td>
                                                    	@if($s->status == 'Belum Disetujui')
                                                    	<i class="fa fa-minus"></i>
                                                    	@elseif($s->status == 'Disetujui')
                                                    	<i class="fa fa-check"></i>
                                                    	@elseif($s->status == 'Ditolak')
                                                    	<i class="fa fa-close"></i>
                                                    	@endif
                                                    </td>
                                                    @if (isset($s->idSemprojadwal))
                                                    <td><a href="{{route('detail_jadwalsempro',['id' => $s->idSemprojadwal])}}"><i class="ti ti-info-alt"> Terjadwal</i></td>
                                                    @else
                                                    <td>Belum Terjadwal</td>
                                                    @endif
                                                    @endforeach
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                        <div class="alert alert-primary" role="alert">
                                            <h4 class="alert-heading"><i class="fa fa-info"></i> Informasi!</h4>
                                            <p><i class="fa fa-minus"> Belum Disetujui Pembimbing</i></p>
                                            <p><i class="fa fa-check"> Disetujui Pembimbing</i></p>
                                            <p><i class="fa fa-close"> Ditolak Pembimbing</i></p>
                                            <hr>
                                            <p class="mb-0">Jika ada kesulitan hubungi <code>Administrator.</code></p>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
</div>

@endsection