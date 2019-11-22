@extends('layouts.admin')

@section('content')

<div class="col-lg-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Jadwal Sempro</h4>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table text-center">
                                            <thead class="text-uppercase bg-primary">
                                                <tr class="text-white">
                                                    <th scope="col">No.</th>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">Judul</th>
                                                    <th scope="col">Pembimbing</th>
                                                    <th scope="col">Penguji 1</th>
                                                    <th scope="col">Penguji 2</th>
                                                    <th scope="col">Tanggal</th>
                                                    <th scope="col">Ruang dan Waktu</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(isset($data) !== null && isset($data2) !== null)
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>{{$data2[0]->name . ' - ' . $data2[0]->nim }}</td>
                                                    <td>{{$data2[0]->judul}}</td>
                                                    <td>{{$data2[0]->nameDosen . ' - ' . $data2[0]->nimDosen}}</td>
                                                    <td>{{$data[0]->namaDosen1}}</td>
                                                    <td>{{$data[0]->namaDosen2}}</td>
                                                    <td>{{date('d-m-Y',strtotime($data[0]->tanggal))}}</td>
                                                    <td>{{$data[0]->nama_ruang . ' Sesi ' .$data[0]->sesi . ' - ' .$data[0]->jam_mulai . ' - ' .$data[0]->jam_akhir}}</td>
                                                 @endif   
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

@endsection