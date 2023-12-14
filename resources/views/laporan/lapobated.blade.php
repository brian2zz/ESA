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
                        <h2 class="text-black font-w600">Laporan Obat Kadaluarsa</h2>

                        <p class="mb-0"> </p>
                    </div>
                    {{-- <div> --}}
                    {{-- <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#addObat">Tambah<span
                            class="btn-icon-right" ><i class="fa fa-plus"></i></span>
                        </button> --}}
                    {{-- </div> --}}
                </div>


                <div class="card">
                    <div class="container-fluid">
                        <div class="card-header">
                            <h4 class="card-title"></h4>
                            <button class="btn btn-primary mr-3 btn-sm "
                                onclick="tablesToExcel(['export_laporan_ED'], 'LaporanKadaluarsa' , 'Laporan Obat Kadaluarsa.xls', 'Excel')">Export
                                Excel</button>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                @include('laporan.table.tableED')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
            <script src="{{ URL::to('javascript/export.js') }}"></script>

            <script type="text/javascript">
                $(document).ready(function() {
                    var table = $('#table_laporan_ED').DataTable();


                });
            </script>
        @endsection
