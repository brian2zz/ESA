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
                        <h2 class="text-black font-w600">Daftar Pengeluaran Obat</h2>
                        <p class="mb-0"> </p>
                    </div>
                </div>

                @if (Auth::user()->role == 'penanggung_jawab')
                    {{-- @include('halaman.modal.addPengeluaranModal')
                    @include('halaman.modal.editPengeluaranModal') --}}
                @endif
                @include('halaman.modal.detailPengeluaranModal')

                <div class="card-header">
                    <div class="modal-body">
                        <h4 class="card-title">Search</h4>
                        <form action="/halpengeluaran/search" method="post">
                            {{ csrf_field() }}
                            &ensp;
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
                                
                                &ensp;
                                <button type="text" class="btn btn-primary mr-3 btn-m"><i class="fa fa-search"></i></button>
    
                                &ensp;
                            </div>
                        </form>
                    </div>
                    <div class="form-row">
                        @if (Auth::user()->role == 'penanggung_jawab')
                            <a href="/halpengeluaran/tambah-pengeluaran" class="btn btn-primary mr-3 btn-sm">Tambah</a>
                        @else
                            <a href='#' class="btn btn-primary mr-3 btn-sm" >Tambah</a>
                        @endif
                        
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table_pengeluaran" class="table table-responsive-md">
                            <thead>
                                <tr>
                                    
                                    <th><strong>Tanggal</strong></th>
                                   
                                    <th><strong>Timestamp <br>Resep <br>Diterima</strong></th>
                                    <th><strong>Timestamp <br>Resep <br>Dikeluarkan</strong></th>

                                    <th class="text-center"><strong>Action</strong></th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_pengeluaran as $data)
                                    <tr>
                                        <td>{{ $data->tanggal_pengeluaran }}</td>
                                        
                                        <td>{{ $data->resep_diterima }}</td>
                                        <td>{{ $data->resep_dikeluarkan }}</td>

                                        <td>
                                            <div class="dropdown ml-auto text-center">
                                                @if ($data->submited == 'false')
                                                    @if (Auth::user()->role == 'penanggung_jawab')
                                                        <a href="/halpengeluaran/{{ $data->id_pengeluaran }}"
                                                            class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                                class="fa fa-pencil"></i></a>
                                                    @else
                                                        <a href="#"
                                                            class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                                class="fa fa-pencil"></i></a>
                                                    @endif
                                                    
                                                    <a href="/halpengeluaran/submit/{{ $data->id_pengeluaran }}"
                                                        class="btn btn-danger shadow btn-xs mr-1 sharp"><i
                                                            class="fa fa-check"></i></a>
                                                @else
                                                    <a disabled href="#"
                                                        class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                            class="fa fa-pencil"></i></a>
                                                    <a disabled href="#"
                                                        class="btn btn-success shadow btn-xs mr-1 sharp"><i
                                                            class="fa fa-check"></i></a>
                                                @endif
                                                <a href="#" class="btn btn-secondary shadow btn-xs sharp"
                                                    data-toggle="modal"
                                                    data-target="#detailHalPengeluaran{{ $data->id_pengeluaran }}"><i
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
            var table = $('#table_pengeluaran').DataTable();


        });
    </script>
@endsection
