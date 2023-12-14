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
                        <h2 class="text-black font-w600">Manajemen Kandungan Obat</h2>
                        <p class="mb-0"> </p>
                    </div>

                </div>

                @if (Auth::user()->role == 'penanggung_jawab')
                    @include('datamaster.modal.kandungan.addKandunganModal')
                    @include('datamaster.modal.kandungan.editKandunganModal')
                @endif
                @include('datamaster.modal.kandungan.detailKandunganModal')

                <div class="card-header">
                    <h4 class="card-title">Daftar Kandungan Obat</h4>
                    <div class="row">
                        <a href="/laporankandungan" class="btn btn-primary mr-3 btn-sm">Laporan Kandungan</a>
                        <a href="javascript:void(0)" class="btn btn-primary mr-3 btn-sm" data-toggle="modal"
                            data-target="#addKandungan">Tambah</a>

                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table_kandungan" class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th class="width50">
                                        <div class="custom-control custom-checkbox checkbox-success check-lg mr-3">
                                            <input type="checkbox" class="custom-control-input" id="checkAll"
                                                required="">
                                            <label class="custom-control-label" for="checkAll"></label>
                                        </div>
                                    </th>
                                    <th><strong>No</strong></th>
                                    <th><strong>Nama Kandungan Obat</strong></th>
                                    <th class="text-center"><strong>Action</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_kandungan as $data)
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox checkbox-success check-lg mr-3">
                                                <input type="checkbox" class="custom-control-input" id="customCheckBox2"
                                                    required="">
                                                <label class="custom-control-label" for="customCheckBox2"></label>
                                            </div>
                                        </td>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="d-flex align-items-center"> <span aria-rowspan="2"
                                                    class="w-space-no">{{ $data->nama_kandungan }}</span>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="dropdown ml-auto text-center">
                                                <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"
                                                    data-toggle="modal"
                                                    data-target="#editKandungan{{ $data->id_kandungan }}"><i
                                                        class="fa fa-pencil"></i></a>
                                                <a href="#" class="btn btn-secondary shadow btn-xs sharp"
                                                    data-toggle="modal" data-target="#detailKandungan"
                                                    data-id="{{ $data->id_kandungan }}"
                                                    data-nama="{{ $data->nama_kandungan }}"><i class="fa fa-eye"></i></a>
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
        $(document).ready(function() {
            $("#detailKandungan").on("show.bs.modal", function(e) {
                const id = $(e.relatedTarget).data('id');
                const nama = $(e.relatedTarget).data('nama');

                $('#passing_id_kandungan').text(id);
                $('#passing_nama_kandungan').text(nama);

            });
        });
    </script>


    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#table_kandungan').DataTable();


        });
    </script>
@endsection
