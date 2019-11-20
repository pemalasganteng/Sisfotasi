@extends('layouts.admin')
@section('content')
<div class="col-12 mt-5">
<div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Data Mahasiswa Mengajukan Proposal</h4>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table text-center">
                                            <thead class="text-uppercase bg-light">
                                                <tr>
                                                    <th scope="col">Tahap ke-</th>
                                                    <th scope="col">Tahapan</th>
                                                    <th scope="col">Keterangan</th>
                                                    <th scope="col">Status</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">{{$loop->iteration}}</th>
                                                    <td>Mark</td>
                                                    <td>09 / 07 / 2018</td>
                                                    <td>$120</td>
                                                    <td><i class="ti-trash"></i></td>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                       </div>
@endsection