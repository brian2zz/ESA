@extends('layout.default')

{{-- Content --}}
@section('content')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <div class="col-lg-12">
        <a href="/halpenerimaan" class="btn btn-primary shadow btn-sm sharp mr-1"><i class="fa fa-chevron-left"></i></a>
        <div class="card">
            <div class="container-fluid">
                <div class="form-head align-items-center d-flex mb-sm-4 mb-3">
                    <div class="mr-auto">
                        <h2 class="text-black font-w600">Edit Penerimaan</h2>
                        <p class="mb-0"> </p>
                    </div>
                </div>
                <div class="modal-body">
                    @foreach ($data_penerimaan as $penerimaan)
                        <form action="/halpenerimaan/edit-penerimaan/{{ $penerimaan->id_penerimaan }}/edit" method="post">
                            {{ csrf_field() }}
                            <input name="id_penerimaan" value="{{ $penerimaan->id_penerimaan }}" class="form-control" 
                                id="#" placeholder="Nomor Batch" hidden>
                            <div class="form-group row">
                                <label for="#" class="col-sm-2 col-form-label text-black font-w500">Tanggal
                                    Penerimaan</label>
                                <div class="col-sm-3">
                                    <input name="tanggal_penerimaan" value="{{ $penerimaan->tanggal_penerimaan }}"
                                        class="datepicker-default form-control" id="datepicker" placeholder="Pilih Tanggal"
                                        required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="#" class="col-sm-2 col-form-label text-black font-w500">Nama
                                    PBF</label>
                                <div class="col-sm-3">
                                    <select class="form-control selectpicker" name="pbf" id="#"
                                        data-live-search="true" required>
                                        <option value="" selected disabled>Pilih Nama PBF</option>
                                        @foreach ($data_pbf as $data)
                                            <option data-tokens="algk" @if ($data->id_pbf == $penerimaan->id_pbf) selected @endif
                                                value="{{ $data->id_pbf }}">{{ $data->nama_PBF }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="card-body" id="row_accordion">
                                @foreach ($data_detail as $detail)
                                <input name="id_detail_penerimaan[]" value="{{ $detail->id_detail_penerimaan_obat }}" class="form-control" id="#"
                                    placeholder="Nomor Batch" hidden>
                                    <div class="row" id="row_accordion_item{{ $loop->iteration }}">
                                        <div class="col">
                                            <div id="accordion-four"
                                                class="accordion accordion-no-gutter accordion-bordered">
                                                <div class="accordion__item">
                                                    <div class="accordion__header" data-toggle="collapse"
                                                        data-target="#bordered_no-gutter_collapse{{ $loop->iteration }}">
                                                        <span class="accordion__header--text">Data Penerimaan</span>
                                                        <span class="accordion__header--indicator style_two"></span>
                                                    </div>
                                                    <div id="bordered_no-gutter_collapse{{ $loop->iteration }}"
                                                        class="collapse accordion__body show" data-parent="#accordion-four">
                                                        <div class="accordion__body--text">
                                                            <div class="form-group row">
                                                                <label for="#"
                                                                    class="col-sm-3 col-form-label text-black font-w500">Nomor
                                                                    Batch
                                                                </label>
                                                                <div class="col-sm-9">
                                                                    <input name="batch_number[]"
                                                                        @if($detail->status_gudang == 'uploaded') readonly @endif
                                                                        value="{{ $detail->batch_number }}"
                                                                        class="form-control" id="#"
                                                                        placeholder="Nomor Batch" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="#"
                                                                    class="col-sm-3 col-form-label text-black font-w500">Nama
                                                                    Obat</label>
                                                                <div class="col-sm-9">
                                                                    @if($detail->status_gudang == 'unuploaded') 
                                                                        <select class="form-control selectpicker dropdown_obat" name="obat[]"
                                                                            id="element" data-live-search="true" required>
                                                                            <option value="" selected disabled>Pilih Nama
                                                                                Obat</option>
                                                                            @foreach ($data_obat as $data)
                                                                                <option data-tokens="algk"
                                                                                    @if ($data->id_obat == $detail->id_obat ) selected @endif
                                                                                    value="{{ $data->id_obat }}">
                                                                                    {{ $data->nama_dagang_obat }} -
                                                                                    {{ $data->nama_satuan_obat }} -
                                                                                    {{ $data->jumlah_dosis_obat }}{{ $data->nama_dosis }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    @else
                                                                        @foreach ($data_obat as $data)
                                                                            @if ($data->id_obat == $detail->id_obat )
                                                                                <input 
                                                                                    class="form-control" id="#"
                                                                                    value="{{ $data->nama_dagang_obat }} - {{ $data->nama_satuan_obat }} - {{ $data->jumlah_dosis_obat }}{{ $data->nama_dosis }}"
                                                                                    placeholder="Harga Beli" disabled>
                                                                                <input  name="obat[]"
                                                                                    class="form-control" id="#"
                                                                                    value="{{ $data->id_obat }}"
                                                                                    placeholder="Nama_obat" hidden>
                                                                            @endif
                                                                        @endforeach
                                                                    @endif
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="#"
                                                                    class="col-sm-3 col-form-label text-black font-w500">Tanggal
                                                                    Expired</label>
                                                                <div class="col-xl-9">
                                                                    <input name="tanggal_expired[]"
                                                                        class="datepicker-default form-control"
                                                                        id="datepicker"
                                                                        value="{{ $detail->tanggal_expired_obat }}"
                                                                        placeholder="Pilih Tanggal" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="#"
                                                                    class="col-sm-3 col-form-label text-black font-w500">Status
                                                                    Expired</label>
                                                                <div class="col-xl-9">
                                                                    <select class="form-control selectpicker"
                                                                        name="status_expired[]" id="element" required>
                                                                        <option value="false"
                                                                            @if ($detail->expired_status == 'false') selected @endif>
                                                                            Belum Expired</option>
                                                                        <option value="true"
                                                                            @if ($detail->expired_status == 'true') selected @endif>
                                                                            Sudah Expired</option>

                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="#"
                                                                    class="col-sm-3 col-form-label text-black font-w500">Harga
                                                                    Beli Satuan
                                                                </label>
                                                                <div class="col-sm-9">
                                                                    <input type="number" name="harga_beli_satuan[]"
                                                                        class="form-control" id="#"
                                                                        value="{{ $detail->harga_beli_satuan }}"
                                                                        placeholder="Harga Beli" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="#"
                                                                    class="col-sm-3 col-form-label text-black font-w500">Jumlah
                                                                    Diterima</label>
                                                                <div class="col-sm-9">
                                                                    <input type="number" name="jumlah_terima[]"
                                                                        class="form-control" id="#"
                                                                        value="{{ $detail->jumlah_obat_diterima }}"
                                                                        placeholder="Jumlah" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="#"
                                                                    class="col-sm-3 col-form-label text-black font-w500">Total
                                                                    Harga Beli
                                                                </label>
                                                                <div class="col-sm-9">
                                                                    <input type="number" name="total_harga[]"
                                                                        class="form-control" id="#"
                                                                        placeholder="Total"
                                                                        value="{{ $detail->total_harga_beli }}" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="#"
                                                                    class="col-sm-3 col-form-label text-black font-w500">Harga
                                                                    Jual
                                                                </label>
                                                                <div class="col-sm-9">
                                                                    <input type="number" name="harga_jual[]"
                                                                        class="form-control" id="#"
                                                                        value="{{ $detail->harga_jual }}"
                                                                        placeholder="Harga jual" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            @if($loop->iteration == 1)
                                            <button class="btn btn-primary btn-sm btn-fill btn-add"
                                                name="add_table" id="{{$count_data}}">+</button>
                                            @else
                                                @if($detail->status_gudang == 'unuploaded')
                                                <button class="btn btn-secondary btn-sm btn-fill btn_remove" id="{{$loop->iteration}}" 
                                                    name="remove" >x</button>
                                                @else
                                                <button class="btn btn-secondary btn-sm btn-fill"  
                                                    disabled><i class="fa fa-lock"></i></button>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="row">
                                &emsp;
                                <div class="form-group">
                                    <button type="text" class="btn btn-primary btn-sm">Edit</button>
                                </div>
                                &emsp;
                                <div class="form-group">
                                    <a href="/halpenerimaan" type="text" class="btn btn-secondary btn-sm">Batal</a>
                                </div>
                            </div>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    {{-- <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
            <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    {{-- <script>
        $(document).ready(function() {
            $('.dropdown_obat').readonly(); 
        });
    </script> --}}
    <script>
        $(document).ready(function() {
        var i = $('.btn-add').attr("id");
        console.log(i);
        $(document).on('click', '.btn-add', function(e) {
            e.preventDefault();
            e.stopPropagation();
            i++;
            $('#row_accordion').append(
                '<div class="row" id="row_accordion_item' + i +'">'+
                    '<div class="col">'+
                        '<div id="accordion-four" class="accordion accordion-no-gutter accordion-bordered">'+
                            '<div class="accordion__item">'+
                                '<div class="accordion__header" data-toggle="collapse" data-target="#bordered_no-gutter_collapse'+i+'">'+
                                    '<span class="accordion__header--text">Data Penerimaan</span>'+
                                    '<span class="accordion__header--indicator style_two"></span>'+
                                '</div>'+
                                '<div id="bordered_no-gutter_collapse'+i+'" class="collapse accordion__body show" data-parent="#accordion-four">'+
                                    '<div class="accordion__body--text">'+
                                        '<div class="form-group row">'+
                                            '<label for="#" class="col-sm-3 col-form-label text-black font-w500">Nomor Batch</label>'+
                                            '<div class="col-sm-9">'+
                                                '<input name="id_detail_penerimaan[]" value="" class="form-control" id="#" placeholder="Nomor Batch" hidden>'+
                                                '<input name="batch_number[]" class="form-control" id="#" placeholder="Nomor Batch" required>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="form-group row">'+
                                            '<label for="#" class="col-sm-3 col-form-label text-black font-w500">Nama Obat</label>'+
                                            '<div class="col-sm-9">'+
                                                '<select class="form-control selectpicker" id="#" name="obat[]" data-live-search="true">'+
                                                    '<option value="" selected>Pilih Nama Obat</option>'+
                                                        // '@foreach ($data_obat as $data)'+
                                                            '<option data-tokens="algk" value="{{ $data->id_obat }}">{{ $data->nama_dagang_obat }} - {{ $data->nama_satuan_obat }} - {{ $data->jumlah_dosis_obat }}{{ $data->nama_dosis }} </option>'+
                                                        // '@endforeach'
                                                '</select>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="form-group row">'+
                                            '<label for="#" class="col-sm-3 col-form-label text-black font-w500">Tanggal Expired</label>'+
                                            '<div class="col-xl-9">'+
                                                '<input name="tanggal_expired[]" class="datepicker-default form-control" id="datepicker" placeholder="Pilih Tanggal" required>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="form-group row">'+
                                            '<label for="#" class="col-sm-3 col-form-label text-black font-w500">Status Expired</label>'+
                                            '<div class="col-xl-9">'+
                                                '<select class="form-control selectpicker"  name="status_expired[]" id="element" required>'+
                                                    '<option value="false" >Belum Expired</option>'+
                                                    '<option value="true" >Sudah Expired</option>'+
                                                '</select>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="form-group row">'+
                                            '<label for="#" class="col-sm-3 col-form-label text-black font-w500">Harga Beli Satuan </label>'+
                                            '<div class="col-sm-9">'+
                                                '<input type="number" name="harga_beli_satuan[]" class="form-control" id="#" placeholder="Harga Beli" required>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="form-group row">'+
                                            '<label for="#" class="col-sm-3 col-form-label text-black font-w500">Jumlah Diterima</label>'+
                                        ' <div class="col-sm-9">'+
                                                '<input type="number" name="jumlah_terima[]" class="form-control" id="#" placeholder="Jumlah" required>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="form-group row">'+
                                            '<label for="#" class="col-sm-3 col-form-label text-black font-w500">Total Harga Beli</label>'+
                                            '<div class="col-sm-9">'+
                                                '<input type="number" name="total_harga[]" class="form-control" id="#" placeholder="Total" required>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="form-group row">'+
                                            '<label for="#" class="col-sm-3 col-form-label text-black font-w500">Harga Jual</label>'+
                                            '<div class="col-sm-9">'+
                                                '<input type="number" name="harga_jual[]" class="form-control" id="#" placeholder="Harga jual" required>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                    '<div class="col">'+
                        '<button class="btn btn-secondary btn-sm btn-fill btn_remove ms-1" id="' + i + '" name="remove" >x</button>'+
                    '</div>'+
                '</div>'
            );
                $('.selectpicker').selectpicker('render');
                $('.datepicker-default').pickadate();
            
        });
        $(document).on('click', '.btn_remove', function(e) {
            e.preventDefault();
            e.stopPropagation();
            var button_id = $(this).attr("id");
            $('#row_accordion_item' + button_id + '').remove();
        });
    });
    </script>
@endsection
