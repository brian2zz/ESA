@extends('layout.default')



{{-- Content --}}
@section('content')
{{-- @if($message = Session::get('message'))
    <div class="container p-t-3">
        <div class="alert alert-danger alert-dismissible fade show">
            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
            
                    <strong>{{$message}}</strong>
            
            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="fa fa-close"></i></span>
                            </button>
        </div>
    </div>
    @endif --}}
					
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">



    <div class="col-lg-12">
        {{-- <a href="/golongan" class="btn btn-primary mr-3 btn-sm">Kembali</a> --}}
        <a href="/halpengeluaran" class="btn btn-primary shadow btn-sm sharp mr-1"><i class="fa fa-chevron-left"></i></a>
        <div class="card">
            <div class="container-fluid">
                <div class="form-head align-items-center d-flex mb-sm-4 mb-3">
                    <div class="mr-auto">
                        <h2 class="text-black font-w600">Tambah Pengeluaran</h2>
                        <p class="mb-0"> </p>
                    </div>
                </div>
        <div class="modal-body">
            <form action="/halpengeluaran/tambah-pengeluaran/create" method="post">
                {{ csrf_field() }}
                    {{-- <div class="form-group row">
                        <label for="#" class="col-sm-2 col-form-label text-black font-w500">Tanggal
                            Beli</label>
                        <div class="col-sm-3">
                            <input name="datepicker" class="datepicker-default form-control" id="datepicker"
                                placeholder="Pilih Tanggal">
                        </div>
                    </div> --}}
                    <div class="form-group row">
                        <label for="#" class="col-sm-2 col-form-label text-black font-w500">Tanggal Pengeluaran</label>
                        <div class="col-sm-3">
                            <input name="buy_date" class="datepicker-default form-control" id="datepicker"
                             placeholder="Pilih Tanggal" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-sm-2 col-form-label text-black font-w500">Nama
                            Dokter</label>
                        <div class="col-sm-3">
                            <select class="form-control selectpicker" name="id_dokter"  id="#" data-live-search="true">
                                <option data-tokens="algk" value="" selected>Pilih Dokter</option>
                                @foreach($dokter as $data)
                                    <option data-tokens="algk" value="{{$data->id_dokter}}">{{$data->nama_dokter}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-sm-2 col-form-label text-black font-w500">Kategori Pengeluaran</label>
                        <div class="col-sm-3">
                            <select class="form-control selectpicker" name="id_kategori"  id="#" required>
                                @foreach($kategori_pengeluaran as $kategori)
                                    <option data-tokens="algk" value="{{$kategori->id_kategori_pengeluaran}}">{{$kategori->nama_kategori}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-sm-2 col-form-label text-black font-w500">Nomor Resep</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="#" name="nomor_resep" placeholder="Nomor" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-sm-2 col-form-label text-black font-w500">Racikan</label>
                        <div class="col-sm-3">
                            <select class="form-control selectpicker" name="racikan"  id="#" required>
                                <option data-tokens="algk" value="true">Racikan</option>
                                <option data-tokens="algk" value="false">Non Racikan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-sm-2 col-form-label text-black font-w500">Timestamp  Resep Diterima</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="#" placeholder="Timestamp" disabled>
                        </div>
                        
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-sm-2 col-form-label text-black font-w500">Timestamp  Resep Keluar</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="#" placeholder="Timestamp" disabled>
                        </div>
                        
                    </div>
                    
                    <div class="container-fluid text-center" id="user_table">
                        <div class="row font-weight-bold pb-md-4">
                          <div class="col">
                            Obat
                          </div>
                          <div class="col">
                            Jumlah Keluar
                          </div>
                          <div class="col">
                            Tata Cara Pemakaian
                          </div>
                          
                          <div class="col">
                            Action
                          </div>
                        </div>
                        
                        <div class="row font-weight-bold pb-md-4">
                            <div class="col">
                                <select class="form-control selectpicker" id="#" name="batch_number[]" data-live-search="true">
                                    <option value="" disabled selected>Pilih obat</option>
                                    @foreach($obat as $data)
                                    <option data-tokens="algk" value="{{$data->batch_number}}">{{ $data->batch_number }}-{{$data->nama_dagang_obat}}
                                        {{$data->jumlah_dosis_obat}}{{$data->nama_dosis}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                    <input type="number" class="form-control" id="#" name="jumlah[]" placeholder="Jumlah">
                            </div>
                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        <input type="number" class="form-control" id="#" name="tata_cara1[]" >
                                    </div>
                                    <div class="col">
                                        X
                                    </div>
                                    <div class="col">
                                        <input type="number" class="form-control" id="#" name="tata_cara2[]">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <button class="btn btn-primary btn-sm btn-fill "
                                                    name="add_table" id="add_table">+</button>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        &emsp;
                        <div class="form-group">
                            <button type="text" class="btn btn-primary btn-sm">Tambah</button>
                        </div>
                        &emsp;                                        
                        <div class="form-group">
                            <button type="text" class="btn btn-secondary btn-sm">Batal</button>
                        </div>
                    </div>
            </form>
        </div>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
            var i = 1;
            $('#add_table').click(function(e) {
                e.preventDefault();
                e.stopPropagation();
                i++;
                
                $('#user_table').append('<div class="row pb-md-4" id="row_user_table' + i +'">'+
                    '<div class="col">'+
                            '<select class="form-control selectpicker" id="#" name="batch_number[]" data-live-search="true">'+
                                '<option value="" disabled selected>Pilih obat</option>'+
                                '@foreach($obat as $data)'+
                                '<option data-tokens="algk" value="{{$data->batch_number}}">{{ $data->batch_number }}-{{$data->nama_dagang_obat}}'+
                                    '{{$data->dosis_obat}}{{$data->satuan_dosis_obat}}'+
                                '</option>'+
                                '@endforeach'+
                            '</select>'+
                        '</div>'+
                        '<div class="col">'+
                            '<input type="number" class="form-control" id="#" name="jumlah[]" placeholder="Jumlah">'+
                        '</div>'+
                        '<div class="col">'+
                            '<div class="row">'+
                                '<div class="col">'+
                                    '<input type="number" class="form-control" id="#" name="tata_cara1[]" >'+
                                '</div>'+
                                '<div class="col">'+
                                    'X'+
                                '</div>'+
                                '<div class="col">'+
                                    '<input type="number" class="form-control" id="#" name="tata_cara2[]">'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                        '<div class="col">'+
                            '<button class="btn btn-secondary btn-sm btn-fill btn_remove ms-1" id="' + i + '" name="remove" >x</button>'+
                        '</div>'+
                    '</div>');
                    $('.selectpicker').selectpicker('render');
                
            });
            $(document).on('click', '.btn_remove', function(e) {
                e.preventDefault();
                e.stopPropagation();
                var button_id = $(this).attr("id");
                $('#row_user_table' + button_id + '').remove();
            });
        });
        </script>
    @endsection