{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <!-- row -->
    <div class="col-lg-12">
        {{-- <a href="/kandungan" class="btn btn-primary mr-3 btn-sm">Kembali</a> --}}
        <a href="/kandungan" class="btn btn-primary shadow btn-sm sharp mr-1"><i class="fa fa-chevron-left"></i></a>
        <div class="card">
            <div class="container-fluid">
                <div class="card-header">
                    <h4 class="card-title">Laporan Kandungan Obat</h4>
                </div>
                <div class="card-header">
                    <div class="form-row">
                        <form action="/laporankandungan/search" method="post">
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
                    <form action="/laporankandungan/export" method="get">
                        {{ csrf_field() }}
                            <input type="text" name="status" value="{{ $search_status }}" hidden>
                            <input type="text" name="kategori" value="{{ $search_kategori }}" hidden>
                            <input type="text" name="golongan" value="{{ $search_golongan }}" hidden>
                            <button type="text" class="btn btn-primary mr-3 btn-sm">Export Excel</button>
                    </form>
                    
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="laporan_kandungan" class="table table-responsive-md">
                        <thead>
                            <tr>
                                <th><strong>No</strong></th>
                                <th><strong>Nama Obat</strong></th>
                                <th><strong>Dosis</strong></th>
                                <th><strong>Satuan</strong></th>
                                <th><strong>Kandungan & Dosis</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($obat as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="d-flex align-items-center"> <span aria-rowspan="2"
                                                class="w-space-no">{{ $data->nama_dagang_obat }}</span>
                                        </div>
                                    </td>
                                    <td>{{ $data->jumlah_dosis_obat }} {{ $data->nama_dosis }}</td>
                                    <td>{{ $data->nama_satuan_obat }}</td>
                                    <td>
                                        @foreach ($kandungan_obat as $kandungan)
                                            @if ($kandungan->id_obat == $data->id_obat)
                                                -{{ $kandungan->nama_kandungan }} {{ $kandungan->jumlah_dosis_kandungan }}
                                                {{ $kandungan->nama_dosis }}<br>
                                            @endif
                                        @endforeach
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
    <script src="{{ URL::to('javascript/export.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#laporan_kandungan').DataTable();


        });
    </script>
@endsection
