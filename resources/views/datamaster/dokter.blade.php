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
                        <h2 class="text-black font-w600">Manajemen Dokter</h2>
                        <p class="mb-0"> </p>
                    </div>
                    
                </div>
               
                @if(Auth::user()->role == 'penanggung_jawab')
                    @include('datamaster.modal.dokter.addDokterModal')
                    @include('datamaster.modal.dokter.editDokterModal')
                @endif
                @include('datamaster.modal.dokter.detailDokterModal')
                
                <div class="card-header">
                    <h4 class="card-title">Daftar Dokter</h4>
                    <div class="row">
                        <a href="javascript:void(0)" class="btn btn-primary mr-3 btn-sm" data-toggle="modal"
                            data-target="#addDokter">Tambah</a>
                            
                    </div>
                </div>
                
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table_dokter" class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th class="width50">
                                        <div class="custom-control custom-checkbox checkbox-success check-lg mr-3">
                                            <input type="checkbox" class="custom-control-input" id="checkAll" required="">
                                            <label class="custom-control-label" for="checkAll"></label>
                                        </div>
                                    </th>
                                    <th><strong>No</strong></th>
                                    <th><strong>Nama Dokter</strong></th>
                                    <th><strong>SIP Dokter</strong></th>
                                    <th class="text-center"><strong>Action</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data_dokter as $data)
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox checkbox-success check-lg mr-3">
                                            <input type="checkbox" class="custom-control-input" id="customCheckBox2"
                                                required="">
                                            <label class="custom-control-label" for="customCheckBox2"></label>
                                        </div>
                                    </td>
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        <div class="d-flex align-items-center"> <span aria-rowspan="2"
                                                class="w-space-no">{{$data->nama_dokter}}</span>
                                        </div>
                                    </td>
                                        <td>{{$data->SIP_dokter}}</td>
                                    <td>
                                        <div class="dropdown ml-auto text-center">
                                            <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"
                                                data-toggle="modal" data-target="#editDokter"
                                                data-iddokter="{{$data->id_dokter}}"
                                                data-namadokter="{{$data->nama_dokter}}"
                                                data-sipdokter="{{$data->SIP_dokter}}"
                                                ><i
                                                    class="fa fa-pencil"></i></a>
                                            <a href="#" class="btn btn-secondary shadow btn-xs sharp" data-toggle="modal"
                                                data-target="#detailDokter"
                                                data-id="{{$data->id_dokter}}"
                                                data-nama="{{$data->nama_dokter}}"
                                                data-sip="{{$data->SIP_dokter}}"
                                                ><i class="fa fa-eye"></i></a>
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
                $("#editDokter").on("show.bs.modal", function (e) {
                    const id = $(e.relatedTarget).data('iddokter'); 
                    const nama = $(e.relatedTarget).data('namadokter'); 
                    const sip = $(e.relatedTarget).data('sipdokter'); 
                    $('#pass_id_dokter').val(id);
                    $('#pass_nama_dokter').val(nama);
                    $('#pass_sip_dokter').val(sip);
                });
            });
        </script>
        <script>
            $(document).ready(function () {
                $("#detailDokter").on("show.bs.modal", function (e) {
                    const id = $(e.relatedTarget).data('id'); 
                    const nama = $(e.relatedTarget).data('nama'); 
                    const sip = $(e.relatedTarget).data('sip'); 
                    $('#passing_id_dokter').text(id);
                    $('#passing_nama_dokter').text(nama);
                    $('#passing_sip_dokter').text(sip);
                });
            });
        
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                var table = $('#table_dokter').DataTable();
    
    
            });
        </script>
@endsection
