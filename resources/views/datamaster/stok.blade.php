{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')

<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <!-- row -->
    <div class="col-lg-12">
        <div class="card">
            <div class="container-fluid">
                <div class="form-head align-items-center d-flex mb-sm-4 mb-3">
                    <div class="mr-auto">
                        <h2 class="text-black font-w600">Manajemen Stok</h2>
                        <p class="mb-0"> </p>
                    </div>
                    
                </div>
               
                @if(Auth::user()->role == 'penanggung_jawab')
                    @include('datamaster.modal.addStokModal')
                    @include('datamaster.modal.editStokModal')
                @endif
                @include('datamaster.modal.detailStokModal')
                
                <div class="card-header">
                    <h4 class="card-title">Daftar Update Stok</h4>
                    <div class="row">
                        <a href="javascript:void(0)" class="btn btn-primary mr-3 btn-sm" data-toggle="modal"
                            data-target="#addStok">Tambah</a>
                            
                    </div>
                </div>
                
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example5" class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th class="width50">
                                        <div class="custom-control custom-checkbox checkbox-success check-lg mr-3">
                                            <input type="checkbox" class="custom-control-input" id="checkAll" required="">
                                            <label class="custom-control-label" for="checkAll"></label>
                                        </div>
                                    </th>
                                    <th><strong>Tanggal</strong></th>
                                    <th><strong>Nama Obat</strong></th>
                                    <th><strong>Jumlah Tambah Stok</strong></th>
                                    <th class="text-center"><strong>Action</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data_stok as $data)
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox checkbox-success check-lg mr-3">
                                            <input type="checkbox" class="custom-control-input" id="customCheckBox2"
                                                required="">
                                            <label class="custom-control-label" for="customCheckBox2"></label>
                                        </div>
                                    </td>
                                    <td>{{$data->tanggal_masuk}}</td>
                                    <td>
                                        <div class="d-flex align-items-center"> <span aria-rowspan="2"
                                                class="w-space-no">{{$data->nama_dagang_obat}}</span>
                                        </div>
                                    </td>
                                        <td>{{$data->jumlah_stok}}</td>
                                    <td>
                                        <div class="dropdown ml-auto text-center">
                                            <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"
                                                data-toggle="modal" data-target="#editStok"
                                                data-tanggal="{{$data->tanggal_masuk}}"
                                                data-id="{{$data->id_tambah_stok}}"
                                                data-obat="{{$data->nama_dagang_obat}}"
                                                data-stok="{{$data->jumlah_stok}}"
                                                ><i
                                                    class="fa fa-pencil"></i></a>
                                            <a href="#" class="btn btn-secondary shadow btn-xs sharp mr-1" data-toggle="modal"
                                                data-target="#detailStok"
                                                data-tglmasuk="{{$data->tanggal_masuk}}"
                                                data-nama="{{$data->nama_dagang_obat}}"
                                                data-jmlstok="{{$data->jumlah_stok}}"
                                                ><i class="fa fa-eye"></i></a>

                                            @if($data->updated=='false')
                                            <a href="/stok/passing/{{$data->id_tambah_stok}}" class="btn btn-info shadow btn-xs sharp"
                                                ><i class="fa fa-pencil-square-o"></i></a>
                                            @else<a disabled href="#" class="btn btn-info shadow btn-xs sharp"
                                                ><i class="fa fa-pencil-square-o"></i></a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    
        <script>
            $(document).ready(function () {
                $("#editStok").on("show.bs.modal", function (e) {
                    const id = $(e.relatedTarget).data('id'); 
                    const tanggal = $(e.relatedTarget).data('tanggal'); 
                    const obat = $(e.relatedTarget).data('obat'); 
                    const stok = $(e.relatedTarget).data('stok'); 
                    $('#pass_id').val(id);
                    $('#pass_tanggal').val(tanggal);
                    $('#pass_obat').val(obat);
                    $('#pass_stok').val(stok);
                });
            });
        </script>

        <script>
            $(document).ready(function () {
                $("#detailStok").on("show.bs.modal", function (e) {
                    const tanggal = $(e.relatedTarget).data('tglmasuk'); 
                    const obat = $(e.relatedTarget).data('nama'); 
                    const stok = $(e.relatedTarget).data('jmlstok'); 
                    $('#passing_tanggal').text(tanggal);
                    $('#passing_obat').text(obat);
                    $('#passing_stok').text(stok);
                });
            });
        
        </script>
@endsection
