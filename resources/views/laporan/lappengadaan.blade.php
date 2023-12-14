{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')
    <!-- row -->
    <div class="col-lg-12">
        <div class="card">
            <div class="container-fluid">
                <div class="form-head align-items-center d-flex mb-sm-4 mb-3">
                    <div class="mr-auto">
                        <h2 class="text-black font-w600">Laporan Pengadaan Obat</h2>
                        <p class="mb-0"> </p>
                    </div>
                </div>


                <div class="card-header">
                    <div class="modal-body">
                        <form action="/lappengadaan/search" method="post">
                            {{ csrf_field() }}
                            <h4 class="card-title"></h4>
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
                                    <select class="form-control selectpicker" name="tahun" id="#" data-live-search="true">
                                        <option data-tokens="algk" selected disabled>Pilih Tahun</option>
                                        <option data-tokens="algk" value="2022">2022</option>
                                        <option data-tokens="atbk" value="2023">2023</option>
                                        <option data-tokens="algk" value="2024">2024</option>
                                        <option data-tokens="atbk" value="2025">2025</option>
                                        <option data-tokens="algk" value="2026">2026</option>
                                        <option data-tokens="atbk" value="2027">2027</option>
                                        <option data-tokens="atbk" value="2028">2028</option>
                                        <option data-tokens="atbk" value="2029">2029</option>
                                        <option data-tokens="atbk" value="2030">2030</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="#" class="col-sm-2 col-form-label ">Nama
                                    PBF</label>
                                <div class="col-sm-5">
                                    <select class="form-control selectpicker" name="pbf" id="#" data-live-search="true">
                                        <option data-tokens="algk" selected disabled>Pilih PBF</option>
                                        @foreach($pbf as $data)
                                        <option data-tokens="algk" value="{{$data->id_pbf}}">{{$data->nama_PBF}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="form-group">
                                <button type="text" class="btn btn-primary btn-sm">Search</button>
                            </div>
                        </form>
                    </div>

                </div>

                <div class="card">
                    <div class="container-fluid">
                        <div class="card-header">
                            {{-- <h4 class="card-title">Laporan Pengadaan Obat PT. Cahaya Bulan Maret 2022</h4> --}}
                            <a href="/lappengadaan/export" class="btn btn-primary mr-3 btn-sm">Export Excel</a>
                        </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                @include('laporan.table.tablePengadaan')
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
