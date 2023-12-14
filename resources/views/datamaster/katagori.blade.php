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
                        <h2 class="text-black font-w600">Manajemen Katagori Obat</h2>
                        <p class="mb-0"> </p>
                    </div>
                </div>



                <div class="card-header">
                    <h4 class="card-title">Daftar Obat & Katagorinya</h4>
                    <div class="row">
                        <a href="/laporankatagori" class="btn btn-primary mr-3 btn-sm">Laporan Katagori</a>
                        <a href="/kelolakatagori" class="btn btn-primary mr-3 btn-sm">Kelola Master Katagori</a>
                        {{-- <a href="javascript:void(0)" class="btn btn-primary mr-3 btn-sm" data-toggle="modal"
                            data-target="#addKatagori">Tambah</a> --}}
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="data_kategori" class="table table-responsive-md">
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
                                    <th><strong>Nama Obat</strong></th>
                                    <th><strong>Katagori</strong></th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategori_obat as $data)
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
                                                    class="w-space-no">{{ $data->nama_dagang_obat }}</span>
                                            </div>
                                        </td>
                                        <td>{{ $data->nama_kategori }}</td>
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
        $(document).ready(function(){
            var table = $('#data_kategori').DataTable();

          
        });
    </script>
@endsection
