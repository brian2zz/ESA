@extends('layout.default')



{{-- Content --}}
@section('content')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <div class="col-lg-12">
        {{-- <a href="/golongan" class="btn btn-primary mr-3 btn-sm">Kembali</a> --}}
        <a href="/golongan" class="btn btn-primary shadow btn-sm sharp mr-1"><i class="fa fa-chevron-left"></i></a>
        <div class="card">
            <div class="container-fluid">
                <div class="form-head align-items-center d-flex mb-sm-4 mb-3">
                    <div class="mr-auto">
                        <h2 class="text-black font-w600">Kelola Golongan</h2>
                        <p class="mb-0"> </p>
                    </div>
                </div>

                @if(Auth::user()->role == 'penanggung_jawab')
                    @include('datamaster.modal.golongan.addGolonganModal')
                    @include('datamaster.modal.golongan.editGolonganModal')
                @endif
                @include('datamaster.modal.golongan.detailGolonganModal')
                <div class="card-header">
                    <h4 class="card-title">Master Golongan Obat</h4>
                    <a href="javascript:void(0)" class="btn btn-primary mr-3 btn-sm" data-toggle="modal"
                        data-target="#addKelolaGolongan">Tambah</a>
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
                                    <th><strong>ID Katagori</strong></th>
                                    <th><strong>Nama Golongan</strong></th>
                                    <th class="text-center"><strong>Action</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_golongan as $data)
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox checkbox-success check-lg mr-3">
                                                <input type="checkbox" class="custom-control-input" id="customCheckBox2"
                                                    required="">
                                                <label class="custom-control-label" for="customCheckBox2"></label>
                                            </div>
                                        </td>
                                        <td>{{ $data->id_golongan }}</td>

                                        <td>
                                            <div class="d-flex align-items-center"> <span aria-rowspan="2"
                                                    class="w-space-no">{{ $data->nama_golongan }}</span>
                                            </div>
                                        </td>
                                        <td class='right-align-class'>
                                            <div class="dropdown ml-auto text-center">
                                                <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"
                                                    data-toggle="modal" data-target="#editKelolaGolongan" 
                                                    data-idgolongan="{{$data->id_golongan}}">
                                                    <i class="fa fa-pencil"></i></a>
                                                    
                                                <a href="#" class="btn btn-secondary shadow btn-xs sharp"
                                                    data-toggle="modal" data-target="#detailKelolaGolongan"
                                                    data-id="{{$data->id_golongan}}"
                                                    data-nama="{{$data->nama_golongan}}"><i
                                                        class="fa fa-eye"></i></a>
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
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    
        <script>
            $(document).ready(function () {
                $("#editKelolaGolongan").on("show.bs.modal", function (e) {
                    const id = $(e.relatedTarget).data('idgolongan'); 
                    $('#pass_id_golongan').val(id);
                });
            });
        
        </script>
        <script>
            $(document).ready(function () {
                $("#detailKelolaGolongan").on("show.bs.modal", function (e) {
                    const id = $(e.relatedTarget).data('id'); 
                    const nama = $(e.relatedTarget).data('nama'); 
                    $('#passing_id_golongan').text(id);
                    $('#passing_nama_golongan').text(nama);
                });
            });
        
        </script>
    @endsection
