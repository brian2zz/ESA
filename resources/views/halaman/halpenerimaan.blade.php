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
                        <h2 class="text-black font-w600">Daftar Penerimaan Obat</h2>
                        <p class="mb-0"> </p>
                    </div>
                    {{-- <div>
                    </div> --}}
                </div>

                @if (Auth::user()->role == 'penanggung_jawab')
                    {{-- @include('halaman.modal.addPenerimaanModal')
                    @include('halaman.modal.editPenerimaanModal') --}}
                @endif
                @include('halaman.modal.detailPenerimaanModal')


                <div class="card-header">
                    <form action="/halpenerimaan/search" method="post">
                        {{ csrf_field() }}
                        <div class="form-row">
                            <a><select class="form-control selectpicker" name='bulan' id="#">
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
                                </select></a>

                            &ensp;
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
                            &ensp;
                            <a> <select class="form-control selectpicker" name="pbf" id="#">
                                    <option data-tokens="algk" selected disabled>Pilih PBF</option>
                                    @foreach ($data_pbf as $data)
                                        <option data-tokens="algk" value="{{ $data->id_pbf }}">{{ $data->nama_PBF }}
                                        </option>
                                    @endforeach
                                </select>
                            </a>
                            &ensp;
                            <button type="text" class="btn btn-primary mr-3 btn-m"><i class="fa fa-search"></i></button>

                            &ensp;
                        </div>
                    </form>

                    <div class="form-row">
                        @if (Auth::user()->role == 'penanggung_jawab')
                            <a href='/halpenerimaan/tambah-penerimaan' class="btn btn-primary mr-3 btn-sm" >Tambah</a>
                        @else
                            <a href='#' class="btn btn-primary mr-3 btn-sm" >Tambah</a>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table_penerimaan" class="table table-responsive-md">
                            <thead>
                                <tr>

                                    {{-- <th><strong>ID</strong></th> --}}
                                    {{-- <th><strong>Tanggal</strong></th> --}}
                                    <th><strong>No</strong></th>
                                    <th><strong>PBF</strong></th>
                                    <th><strong>Tanggal Penerimaan</strong></th>
                                    <th class="text-center"><strong>Action</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_table as $data)
                                    <tr>
                                        {{-- <td><strong>001</strong></td> --}}
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->nama_PBF }}</td>
                                        <td>{{ $data->tanggal_penerimaan }}</td>
                                        <td>
                                            <div class="dropdown ml-auto text-center">  
                                                @if (Auth::user()->role == 'penanggung_jawab')
                                                    <a href="/halpenerimaan/edit-penerimaan/{{ $data->id_penerimaan }}" 
                                                        class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a> 
                                                @else
                                                    <a href="#" 
                                                        class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a> 
                                                @endif
                                                

                                                <a href="#" class="btn btn-secondary shadow btn-xs sharp"
                                                    data-toggle="modal" data-target="#detailHalPenerimaan{{ $data->id_penerimaan }}"
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
@endsection
