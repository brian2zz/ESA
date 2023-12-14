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
                        <h2 class="text-black font-w600">Pedagang Besar Farmasi</h2>
                        <p class="mb-0"> </p>
                    </div>
                    {{-- <div>
                        
                    </div> --}}
                </div>
                @if(Auth::user()->role == 'penanggung_jawab')
                    @include('datamaster.modal.pbf.addPbfModal')
                    @include('datamaster.modal.pbf.editPbfModal')
                @endif
                @include('datamaster.modal.pbf.detailPbfModal')
                

                <div class="card-header">
                    <h4 class="card-title">Daftar PBF</h4>
                    <a href="javascript:void(0)" class="btn btn-primary mr-3 btn-sm" data-toggle="modal"
                            data-target="#addPbf">Tambah</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table_pbf" class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th class="width50">
                                        <div class="custom-control custom-checkbox checkbox-success check-lg mr-3">
                                            <input type="checkbox" class="custom-control-input" id="checkAll" required="">
                                            <label class="custom-control-label" for="checkAll"></label>
                                        </div>
                                    </th>
                                    <th><strong>ID</strong></th>
                                    <th><strong>Nama PBF</strong></th>
                                    <th><strong>Nama PIC</strong></th>
                                    <th><strong>No. Telepon PIC</strong></th>
                                    <th><strong>Lead Time</strong></th>
                                    <th class="text-center"><strong>Action</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data_pbf as $data)
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox checkbox-success check-lg mr-3">
                                            <input type="checkbox" class="custom-control-input" id="customCheckBox2"
                                                required="">
                                            <label class="custom-control-label" for="customCheckBox2"></label>
                                        </div>
                                    </td>
                                    <td>{{$data->id_pbf}}</td>
                                    <td>
                                        <div class="d-flex align-items-center"> <span aria-rowspan="2"
                                                class="w-space-no">{{$data->nama_PBF}}</span>
                                        </div>
                                    </td>
                                    <td>{{$data->nama_PIC}}</td>
                                    <td>{{$data->no_tlp_PIC}}</td>
                                    <td>{{$data->leadtime}}</td>
                                    <td>
                                        <div class="dropdown ml-auto text-center">
                                            <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"
                                                data-toggle="modal" data-target="#editPbf{{$data->id_pbf}}"
                                                ><i
                                                    class="fa fa-pencil"></i></a>
                                            <a href="#" class="btn btn-secondary shadow btn-xs sharp" data-toggle="modal"
                                                data-target="#detailPbf{{$data->id_pbf}}"
                                                {{-- data-namaobat="{{$data->nama_dagang_obat}}"
                                                data-dosisobat="{{$data->dosis_obat}}"
                                                data-satuanobat="{{$data->nama_satuan_obat}}"
                                                data-tanggalbeli="{{$data->tanggal_beli}}"
                                                data-expireddate="{{$data->tanggal_expired}}"
                                                data-hargaobat="{{$data->harga}}"
                                                data-jumlahbeli="{{$data->jumlah_diterima}}"
                                                data-stok="{{$data->stok}}"
                                                data-id="{{$data->id_pbf}}"
                                                data-namapbf="{{$data->nama_PBF}}"
                                                data-alamatpbf="{{$data->alamat_PBF}}"
                                                data-telppbf="{{$data->no_tlp_PBF}}"
                                                data-namapic="{{$data->nama_PIC}}"
                                                data-telppic="{{$data->no_tlp_PIC}}"
                                                data-rekpbf="{{$data->nomer_rekening}}"
                                                data-leadtime="{{$data->leadtime}}"
                                                data-stsexpired="{{$data->expired}}" --}}
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
    
        {{-- <script>
            $(document).ready(function () {
                $("#editPbf").on("show.bs.modal", function (e) {
                    const id = $(e.relatedTarget).data('idpbf'); 
                    $('#pass_id_pbf').val(id);
                });
            });
        
        </script> --}}
      
        <script type="text/javascript">
            $(document).ready(function() {
                var table = $('#table_pbf').DataTable();
    
    
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.table_detail').DataTable();
    
    
            });
        </script>
@endsection
