{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')
    <!-- row -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <div class="col-lg-12">
        <div class="card">
            <div class="container-fluid">
                <div class="form-head align-items-center d-flex mb-sm-4 mb-3">
                    <div class="mr-auto">
                        <h2 class="text-black font-w600">Daftar Pengadaan Obat</h2>
                        <p class="mb-0"> </p>
                    </div>
                    {{-- <div>
                    </div> --}}
                </div>



                <div class="card-header">
                    <form action="/halpengadaan/search" method="post">
                        {{ csrf_field() }}
                        <div class="form-row">
                            <a><select class="form-control selectpicker" name='bulan' id="#"
                                    data-live-search="true">
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
                            <a> <select class="form-control selectpicker" name="tahun" id="#"
                                    data-live-search="true">
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
                                </select></a>
                            &ensp;
                            <button type="text" class="btn btn-primary mr-3 btn-m"><i class="fa fa-search"></i></button>

                            &ensp;
                    </form>
                </div>
                <div class="form-row">
                    @if (Auth::user()->role == 'penanggung_jawab')
                        <a href="/tambahpengadaan" class="btn btn-primary mr-3 btn-sm">Tambah</a>
                    @else
                        <a href="#" class="btn btn-primary mr-3 btn-sm">Tambah</a>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table_pengadaan" class="table table-responsive-md">
                        <thead>
                            <tr>

                                <th><strong>ID</strong></th>
                                <th><strong>Tanggal</strong></th>
                                <th><strong>Nama PBF</strong></th>
                                <th class="text-center"><strong>Action</strong></th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_pengadaan as $data)
                                <tr>

                                    <td>{{ $data->id_pengadaan }}</td>
                                    <td>{{ $data->tanggal_pengadaan}}</td>
                                    @foreach ($data_pbf as $pbf)
                                        @if ($pbf->id_pbf == $data->pbf)
                                            <td>{{ $pbf->nama_PBF }}</td>
                                        @endif
                                    @endforeach
                                    <td>
                                        <div class="dropdown ml-auto text-center">
                                            @if (Auth::user()->role == 'penanggung_jawab')
                                                <a href="/editpengadaan/{{ $data->id_pengadaan }}"
                                                    class="btn btn-primary shadow btn-xs sharp mr-1">
                                                    <i class="fa fa-pencil"></i></a>
                                            @else
                                                <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1">
                                                    <i class="fa fa-pencil"></i></a>
                                            @endif

                                            <a href="/detailpengadaan/{{ $data->id_pengadaan }}"
                                                class="btn btn-secondary shadow btn-xs sharp">
                                                <i class="fa fa-eye"></i></a>
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
        $(document).ready(function(){
            var table = $('#table_pengadaan').DataTable();

          
        });
    </script>
@endsection
