{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <!-- row -->
    <div class="col-lg-12">
        {{-- <a href="/katagori" class="btn btn-primary mr-3 btn-sm">Kembali</a> --}}
        <a href="/katagori" class="btn btn-primary shadow btn-sm sharp mr-1"><i class="fa fa-chevron-left"></i></a>

        <div class="card">
            <div class="container-fluid">
                <div class="card-header">

                    <h4 class="card-title">Laporan Katagori Obat</h4>
                </div>

                <div class="card-header">
                    <div class="form-row">
                        <form action="/laporankatagori/search" method="post">
                            {{ csrf_field() }}
                            <div class="form-row">

                                <a><select class="form-control selectpicker" data-width="200px" name="kategori"
                                        id="#">
                                        <option data-tokens="algk" selected value="">Pilih Kategori</option>
                                        @foreach ($kategori as $data)
                                                <option data-tokens="algk" value="{{ $data->id_kategori }}">
                                                    {{ $data->nama_kategori }}</option>
                                            @endforeach
                                    </select></a>
                                <a><select class="form-control selectpicker" data-width="200px" name="golongan"
                                        id="#">
                                        <option data-tokens="algk" selected value="">Pilih Golongan</option>
                                        @foreach ($golongan as $data)
                                                <option data-tokens="algk" value="{{ $data->id_golongan }}">
                                                    {{ $data->nama_golongan }}</option>
                                            @endforeach
                                    </select></a>
                                <a><select class="form-control selectpicker" data-width="200px" name="status"
                                        id="#">
                                        <option data-tokens="algk" selected value="">Pilih Status</option>
                                        <option data-tokens="algk" value="Continue">Continue</option>
                                        <option data-tokens="algk" value="Discontinue">Discontinue</option>
                                    </select></a>

                                &ensp;

                                <button type="text" class="btn btn-primary mr-3 btn-m"><i
                                        class="fa fa-search"></i></button>
                                &ensp;
                        </form>
                    </div>
                </div>
                <div class="card-header">
                    <button class="btn btn-primary mr-3 btn-sm " 
                    onclick="tablesToExcel(['laporan_kategori_export'], 'LaporanKategori' , 'Laporan Kategori.xls', 'Excel')">Export Excel</button>
                    {{-- <a href="/laporankatagori/export" class="btn btn-primary mr-3 btn-sm ">Export Excel</a> --}}
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    @include('datamaster.tableExport.laporanKatagoriTable')
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
            var table = $('#laporan_kategori').DataTable();


        });
    </script>
@endsection
