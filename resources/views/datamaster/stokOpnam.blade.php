{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>


    {{-- add --}}


    <div class="col-lg-12">
        <div class="card">
            <div class="container-fluid">
                <div class="form-head align-items-center d-flex mb-sm-4 mb-3">
                    <div class="mr-auto">
                        <h2 class="text-black font-w600">Stok Opnam</h2>
                        <p class="mb-0"> </p>
                    </div>

                </div>

                @if (Auth::user()->role == 'penanggung_jawab')
                    @include('datamaster.modal.stokOpnam.addStokOpnamModal')
                    @include('datamaster.modal.stokOpnam.editStokOpnamModal')
                @endif

                @include('datamaster.modal.stokOpnam.detailStokOpnamModal')

                <div class="card-header">
                    <h4 class="card-title">Daftar Stok Obat</h4>
                    <div class="row">

                        <a href="javascript:void(0)" class="btn btn-primary mr-3 btn-sm" data-toggle="modal"
                            data-target="#addStokOpnam">Tambah</a>

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th><strong>Nomor Batch</strong></th>
                                    <th><strong>Tanggal Penerimaan</strong></th>
                                    <th><strong>Nama Obat</strong></th>
                                    <th><strong>Jumlah rekonsiliasi</strong></th>
                                    <th><strong>Jumlah Stok Obat</strong></th>
                                    <th class="text-center"><strong>Action</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_stok_opnam as $data)
                                    <tr>

                                        <td>{{ $data->batch_number }}</td>
                                        <td>{{ $data->tanggal_opnam }}</td>
                                        <td>
                                            <div class="d-flex align-items-center"> <span aria-rowspan="2"
                                                    class="w-space-no">{{ $data->nama_dagang_obat }}</span>
                                            </div>
                                        </td>
                                        <td>{{ $data->rekonsiliasi }}</td>
                                        <td>
                                            {{ $data->stok }}
                                        </td>
                                        <td>
                                            <div class="dropdown ml-auto text-center">

                                                <a href="#"
                                                    class="btn btn-primary edit_penerimaan shadow btn-xs sharp mr-1"
                                                    data-toggle="modal"
                                                    data-target="#editStokOpnam{{ $data->id_stok_opnam }}"><i
                                                        class="fa fa-pencil"></i></a>

                                                <a href="#" class="btn btn-secondary shadow btn-xs sharp mr-1"
                                                    data-toggle="modal" data-target="#detailStokOpnam"
                                                    data-nomorbatch="{{ $data->batch_number }}"
                                                    data-tglmasuk="{{ $data->tanggal_opnam }}"
                                                    data-nama="{{ $data->nama_dagang_obat }}"
                                                    data-expired="{{ $data->expired_date}}"
                                                    data-jmlStok="{{ $data->stok }}"
                                                    data-keterangan="{{ $data->keterangan }}"
                                                    data-rekonsiliasi="{{ $data->rekonsiliasi }}"
                                                    data-satuan="{{ $data->nama_satuan_obat }}"
                                                    data-dosis="{{ $data->jumlah_dosis_obat }} {{ $data->nama_dosis }}"
                                                    data-golongan="{{ $data->nama_golongan }}"
                                                    data-kategori="{{ $data->nama_kategori }}"><i
                                                        class="fa fa-eye"></i></a>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>


                        {{-- @endforeach --}}


                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>



    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#datatable').DataTable();


        });
    </script>

    <script>
        $(document).ready(function() {
            $("#detailStokOpnam").on("show.bs.modal", function(e) {
                const nomor_batch = $(e.relatedTarget).data('nomorbatch');
                const tanggal = $(e.relatedTarget).data('tglmasuk');
                const obat = $(e.relatedTarget).data('nama');
                const stok = $(e.relatedTarget).data('jmlstok');
                const expired = $(e.relatedTarget).data('expired');
                const keterangan = $(e.relatedTarget).data('keterangan');
                const rekonsiliasi = $(e.relatedTarget).data('rekonsiliasi');
                const satuan = $(e.relatedTarget).data('satuan');
                const dosis = $(e.relatedTarget).data('dosis');
                const golongan = $(e.relatedTarget).data('golongan');
                const kategori = $(e.relatedTarget).data('kategori');

                $('#passing_id').text(nomor_batch);
                $('#passing_tanggal').text(tanggal);
                $('#passing_obat').text(obat);
                $('#passing_expired').text(expired);
                $('#passing_stok').text(stok);
                $('#passing_keterangan').text(keterangan);
                $('#passing_rekonsiliasi').text(rekonsiliasi);
                $('#passing_satuan').text(satuan);
                $('#passing_dosis').text(dosis);
                $('#passing_golongan').text(golongan);
                $('#passing_kategori').text(kategori);
            });
        });
    </script>
@endsection
