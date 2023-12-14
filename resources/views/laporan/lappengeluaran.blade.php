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
                        <h2 class="text-black font-w600">Laporan Pengeluaran Resep Obat</h2>
                        <p class="mb-0"> </p>
                    </div>           
                    {{-- <div> --}}
                        {{-- <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#addObat">Tambah<span
                            class="btn-icon-right" ><i class="fa fa-plus"></i></span>
                        </button> --}}
                    {{-- </div> --}}                  
                </div>
                <div class="card-header">
                    <div class="modal-body">
                        <form action="/lappengeluaran/search" method="post">
                            {{ csrf_field() }}
                            <h4 class="card-title">Search</h4>
                            &ensp;
                            <div class="form-group row">
                                <label for="#" class="col-sm-2 col-form-label ">Bulan</label>
                                <div class="col-sm-5">
                                    <select class="form-control selectpicker" name="bulan" id="#" data-live-search="true">
                                        <option data-tokens="algk" selected disabled>Pilih Bulan</option>
                                        <option data-tokens="algk" value="January">January</option>
                                        <option data-tokens="atbk" value="February">February</option>
                                        <option data-tokens="atbk" value="March">March</option>
                                        <option data-tokens="atbk" value="April">April</option>
                                        <option data-tokens="atbk" value="May">May</option>
                                        <option data-tokens="atbk" value="June">June</option>
                                        <option data-tokens="atbk" value="July">July</option>
                                        <option data-tokens="atbk" value="August">August</option>
                                        <option data-tokens="atbk" value="September">September</option>
                                        <option data-tokens="atbk" value="October">October</option>
                                        <option data-tokens="atbk" value="November">November</option>
                                        <option data-tokens="atbk" value="December">December</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="#" class="col-sm-2 col-form-label ">Tahun</label>
                                <div class="col-sm-5">
                                    <a> <select class="form-control selectpicker" data-live-search="true" name="tahun"
                                        id="#">
                                        <option data-tokens="algk" selected disabled>Pilih Tahun</option>
                                        @php
                                            $tahun = date('Y');
                                        @endphp
                                        @foreach (range(2022, $tahun + 5) as $value)
                                            <option data-tokens="algk" value="{{ $value }}">{{ $value }}</option>
                                        @endforeach
                                    </select></a>
                                </div>
                            </div>
                            <button type="text" class="btn btn-primary mr-3 btn-m"><i class="fa fa-search"></i></button>
                        &ensp;
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="container-fluid">
                        <div class="card-header">
                            {{-- <h4 class="card-title">Pengeluaran Obat Tanggal 2 Februari 2022</h4> --}}
                            <button class="btn btn-primary mr-3 btn-sm "
                                onclick="tablesToExcel(['export_laporan_pengeluaran'], 'LaporanPengeluaran' , 'Laporan Pengeluaran.xls', 'Excel')">Export
                                Excel</button>
                        </div>
                <div class="card-body">
                    <div class="table-responsive">             
                        @include('laporan.table.tablePengeluaran')
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
            var table = $('#datatable').DataTable();


        });
    </script>
@endsection
