{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    @if (count($errors) > 0)
        <div class="container p-t-3">
            <div class="alert alert-danger alert-dismissible fade show">


                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

                <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i
                            class="fa fa-close"></i></span>
                </button>
            </div>
        </div>
    @endif
    <!-- row -->
    <div class="col-lg-12">
        <div class="card">
            <div class="container-fluid">
                <div class="form-head align-items-center d-flex mb-sm-4 mb-3">
                    <div class="mr-auto">
                        <h2 class="text-black font-w600">Dashboard Stok Obat</h2>
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
                    <div class="form-group row">

                        <label for="#" class="col-sm-5 col-form-label "> Filter Tanggal</label>

                        <form action="/dashboard2/search" method="post">
                            {{ csrf_field() }}
                            <div class="form-row">
                                <a><select class="form-control selectpicker" name='bulan' id="#" required
                                        data-live-search="true">
                                        <option data-tokens="algk" selected value="">Pilih Bulan</option>
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
                                <a> <select class="form-control selectpicker" name="tahun" id="#" required
                                        data-live-search="true">
                                        <option data-tokens="algk" selected value="">Pilih Tahun</option>
                                        <option data-tokens="algk" value="2022">2022</option>
                                        <option data-tokens="atbk" value="2023">2023</option>
                                        <option data-tokens="algk" value="2024">2024</option>
                                        <option data-tokens="atbk" value="2025">2025</option>
                                        <option data-tokens="algk" value="2026">2026</option>
                                        <option data-tokens="atbk" value="2027">2027</option>
                                        <option data-tokens="atbk" value="2028">2028</option>
                                        <option data-tokens="atbk" value="2029">2029</option>
                                        <option data-tokens="atbk" value="2030">2030</option>
                                    </select></a>

                                &ensp;
                                <button type="text" class="btn btn-primary mr-3 btn-m"><i
                                        class="fa fa-search"></i></button>

                                &ensp;
                            </div>
                        </form>

                    </div>


                </div>
                <div class="card">
                    <div class="container-fluid">
                        <div class="card-header">
                            <h4 class="card-title">{{ $tanggal }}</h4>
                            <button class="btn btn-primary mr-3 btn-sm "
                                onclick="tablesToExcel(['table_dashboard_export'], 'LaporanDashboard' , 'Laporan Dashboard.xls', 'Excel')">Export
                                Excel</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                @include('dashboard2.tableDashboard')
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
                    var table = $('#table_dashboard').DataTable();


                });
            </script>
        @endsection
