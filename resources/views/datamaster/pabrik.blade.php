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
                        <h2 class="text-black font-w600">Manajemen Pabrik</h2>
                        <p class="mb-0"> </p>
                    </div>
                    {{-- <div>
                    </div> --}}
                </div>
                @if (Auth::user()->role == 'penanggung_jawab')
                    @include('datamaster.modal.pabrik.addPabrikModal')

                    @include('datamaster.modal.pabrik.editPabrikModal')
                @endif
                @include('datamaster.modal.pabrik.detailPabrikModal')

                <div class="card-header">
                    <h4 class="card-title">Daftar Pabrik</h4>
                    <a href="javascript:void(0)" class="btn btn-primary mr-3 btn-sm" data-toggle="modal"
                        data-target="#addPabrik">Tambah</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table_pabrik" class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th class="width50">
                                        <div class="custom-control custom-checkbox checkbox-success check-lg mr-3">
                                            <input type="checkbox" class="custom-control-input" id="checkAll"
                                                required="">
                                            <label class="custom-control-label" for="checkAll"></label>
                                        </div>
                                    </th>
                                    <th><strong>ID</strong></th>
                                    <th><strong>Nama Pabrik</strong></th>
                                    <th><strong>Alamat Pabrik</strong></th>
                                    <th><strong>No. Telp Pabrik</strong></th>
                                    <th class="text-center"><strong>Action</strong></th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_pabrik as $data)
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox checkbox-success check-lg mr-3">
                                                <input type="checkbox" class="custom-control-input" id="customCheckBox2"
                                                    required="">
                                                <label class="custom-control-label" for="customCheckBox2"></label>
                                            </div>
                                        </td>
                                        <td>{{ $data->id_pabrik }}</td>
                                        <td>
                                            <div class="d-flex align-items-center"> <span aria-rowspan="2"
                                                    class="w-space-no">{{ $data->nama_pabrik }}</span>
                                            </div>
                                        </td>
                                        <td>{{ $data->alamat_pabrik }}</td>
                                        <td>{{ $data->no_telp_pabrik }}</td>
                                        <td>
                                            <div class="dropdown ml-auto text-center">
                                                <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"
                                                    data-toggle="modal" data-target="#editPabrik{{ $data->id_pabrik }}"><i
                                                        class="fa fa-pencil"></i></a>
                                                <a href="#" class="btn btn-secondary shadow btn-xs sharp"
                                                    data-toggle="modal" data-target="#detailPabrik{{ $data->id_pabrik }}"><i
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
    </div>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#table_pabrik').DataTable();


        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            var table = $('#tableObatPabrik').DataTable();
        });
    </script>
@endsection
