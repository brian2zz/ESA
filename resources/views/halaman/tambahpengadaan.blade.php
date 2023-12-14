@extends('layout.default')



{{-- Content --}}
@section('content')
@if($message = Session::get('message'))
    <div class="container p-t-3">
        <div class="alert alert-danger alert-dismissible fade show">
            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
            
                    <strong>{{$message}}</strong>
            
            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="fa fa-close"></i></span>
                            </button>
        </div>
    </div>
    @endif
					
<link href='vendor/bootstrap-select/dist/css/bootstrap-select.min.css' rel="stylesheet" type="text/css"/>
<link href='vendor/datatables/css/jquery.dataTables.min.css' rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">



    <div class="col-lg-12">
        {{-- <a href="/golongan" class="btn btn-primary mr-3 btn-sm">Kembali</a> --}}
        <a href="/halpengadaan" class="btn btn-primary shadow btn-sm sharp mr-1"><i class="fa fa-chevron-left"></i></a>
        <div class="card">
            <div class="container-fluid">
                <div class="form-head align-items-center d-flex mb-sm-4 mb-3">
                    <div class="mr-auto">
                        <h2 class="text-black font-w600">Penambahan Pengadaan</h2>
                        <p class="mb-0"> </p>
                    </div>
                </div>
        <div class="modal-body">
            <form action="/tambahpengadaan/create" method="post">
                {{ csrf_field() }}
                <div class="form-group row">
                    <label for="#" class="col-sm-2 col-form-label text-black font-w500">Pengadaan di PBF</label>
                    <div class="col-sm-10">
                        <select class="form-control selectpicker" id="#" name="id_pbf" required data-live-search="true">
                            <option value="" disabled selected>Pilih PBF</option>
                            @foreach($data_pbf as $data)
                            <option data-tokens="algk" value="{{$data->id_pbf}}">{{$data->nama_PBF}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="#" class="col-sm-2 col-form-label text-black font-w500">Tanggal</label>
                    <div class="col-sm-10">
                        <input name="tanggal" required class="datepicker-default form-control" id="datepicker"
                         placeholder="Pilih Tanggal">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="#" class="col-sm-2 col-form-label text-black font-w500">Waktu Pengadaan</label>
                    <div class="col-sm-10">
                        <input type="number" value="" required class="form-control" name="waktu_pengadaan" id="#" placeholder="Ketik waktu pengadaan">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="#" class="col-sm-2 col-form-label text-black font-w500">Lead Time</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="#" placeholder="Lead Time" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="#" class="col-sm-2 col-form-label text-black font-w500">Jumlah Hari</label>
                    <div class="col-sm-10">
                        <input type="text" required class="form-control" value="30" name="jumlah_hari" id="#" disabled placeholder="Ketik Jumlah Hari">
                    </div>
                </div>
                
                
                <div class="container-fluid text-center" id="user_table">
                    <div class="row font-weight-bold pb-md-4">
                      <div class="col-sm-2">
                        Pabrik
                      </div>
                      <div class="col-sm-3">
                        Obat
                      </div>
                      <div class="col-sm-2">
                        Harga
                      </div>
                     
                      <div class="col">
                        Kebutuhan Obat
                      </div>
                      
                      <div class="col">
                        Action
                      </div>
                    </div>
                    
                    <div class="row font-weight-bold pb-md-4">
                        <div class="col">
                            <select class="form-select selectpicker" id="#" name="pabrik[]" required data-live-search="true">
                                <option disabled value="" selected>Pilih Pabrik</option>
                                @foreach($data_pabrik as $data)
                                <option data-tokens="algk" value="{{$data->id_pabrik}}">{{$data->nama_pabrik}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <select class="form-select selectpicker" required id="#" name="obat[]" data-live-search="true">
                                <option disabled value="" selected>Pilih obat</option>
                                @foreach($data_obat as $data)
                                <option data-tokens="algk" value="{{$data->id}}">{{$data->nama_dagang_obat}} ({{$data->expired_date}})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <input type="number" required class="form-control"
                                                placeholder="Ketik Harga" name="harga[]" id="element">
                        </div>
                        
                        <div class="col">
                            <input type="number" required class="form-control"
                            placeholder="Kebutuhan Obat" name="kebutuhan_obat[]" id="element">
                        </div>
                        
                        <div class="col">
                            <button class="btn btn-primary btn-sm btn-fill "
                                                name="add_table" id="add_table">+</button>
                        </div>
                    </div>
                    
                </div>
                  
                 

                {{-- <div class="table-responsive">
                 
                        <span id="result"></span>
                        <table class="table table-bordered " id="user_table">
                            <thead>
                                <tr>
                                    <th width="0,9%">Pabrik</th>
                                    
                                    <th width="0,9%">Harga</th>
                                    <th width="0,9%">CA</th>
                                    <th width="0,9%">Kebutuhan Obat</th>
                                    <th width="0,9%">Stok Min</th>
                                    <th width="0,9%">Sisa Stok</th>
                                    <th width="0,9%">CT</th>
                                    <th width="0,9%">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <select class="form-select selectpicker" id="#" name="pabrik[]" data-live-search="true">
                                            <option disabled selected>Pilih Pabrik</option>
                                            @foreach($data_pabrik as $data)
                                            <option data-tokens="algk" value="{{$data->id_pabrik}}">{{$data->nama_pabrik}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                   
                                    <td>
                                        <input type="text" class="form-control"
                                            placeholder="Ketik Harga" name="harga[]" id="element">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control"
                                            placeholder="Auto" name="CA[]" id="element" disabled>

                                    </td>
                                    <td>
                                        <input type="text" class="form-control"
                                            placeholder="Kebutuhan Obat" name="kebutuhan_obat[]" id="element">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control"
                                            placeholder="Auto" name="stok_min[]" id="element" disabled>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control"
                                            placeholder="Auto" name="sisa_stok[]" id="element" disabled>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control"
                                            placeholder="Auto" name="CT[]" id="element" disabled>
                                    </td>
                                    <td>
                                        <button class="btn btn-primary btn-sm btn-fill pull-left"
                                            name="add_table" id="add_table">+</button>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>
                    
                </div> --}}

                <div class="row mt-md-5">
                    &emsp;
                    <div class="form-group">
                        <button  type="submit" class="btn btn-primary btn-sm">Tambah</button>
                    </div>
                    &emsp;                                        
                    <div class="form-group">
                        <a href="/halpengadaan" class="btn btn-secondary mr-3 btn-sm">batal</a>
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
                
                $('#user_table').append('<div class="row pb-md-4" id="row_user_table' + i +
                    '"><div class="col">'+
                            '<select class="form-select selectpicker" id="#" name="pabrik[]" data-live-search="true">'+
                            '<option disabled selected>Pilih Pabrik</option>'+
                            '@foreach($data_pabrik as $data)'+
                            '<option data-tokens="algk" value="{{$data->id_pabrik}}">{{$data->nama_pabrik}}</option>'+
                            '@endforeach</select>'+
                        '</div>'+
                        '<div class="col">'+
                            '<select class="form-select selectpicker" id="#" name="obat[]" data-live-search="true">'+
                                '<option disabled selected>Pilih obat</option>'+
                                '@foreach($data_obat as $data)'+
                                '<option data-tokens="algk" value="{{$data->id}}">{{$data->nama_dagang_obat}} ({{$data->expired_date}})</option>'+
                                '@endforeach'+
                            '</select>'+
                        '</div>'+
                        '<div class="col">'+
                            '<input type="text" class="form-control"placeholder="Ketik Harga" name="harga[]" id="element">'+
                        '</div>'+
                        '<div class="col">'+
                            '<input type="text" class="form-control"placeholder="Kebutuhan Obat" name="kebutuhan_obat[]" id="element">'+
                        '</div>'+
                        '<div class="col">'+
                            '<button class="btn btn-secondary btn-sm btn-fill btn_remove ms-1" id="' +i + '" name="remove" >x</button>'+
                        '</div>'+
                        '</div>');
                    $('.selectpicker').selectpicker('render');
                // $('#user_table').append('<tr id="row_user_table' + i +
                //     '"><td><select class="form-select selectpicker" id="#" name="pabrik[]" data-live-search="true"><option disabled selected>Pilih Pabrik</option>@foreach($data_pabrik as $data)<option data-tokens="algk" value="{{$data->id_pabrik}}">{{$data->nama_pabrik}}</option>@endforeach</select></td><td> <select class="form-select selectpicker" id="#" name="obat[]" data-live-search="true"><option disabled selected>Pilih obat</option>@foreach($data_obat as $data)<option data-tokens="algk" value="{{$data->ID}}">{{$data->nama_dagang_obat}}</option>@endforeach</select></td><td><input type="text" class="form-control" placeholder="Ketik Harga" name="harga[]" id="element"></td><td><input type="text" class="form-control" placeholder="Kebutuhan Obat" name="kebutuhan_obat[]" id="element"></td><td><button class="btn btn-secondary btn-sm btn-fill btn_remove" id="' +
                //     i + '" name="remove" >x</button></td></tr>');
                //     $('.selectpicker').selectpicker('render');
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