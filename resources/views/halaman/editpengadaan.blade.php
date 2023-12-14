@extends('layout.default')



{{-- Content --}}
@section('content')

    


    <div class="col-lg-12">
        {{-- <a href="/golongan" class="btn btn-primary mr-3 btn-sm">Kembali</a> --}}
        <a href="/halpengadaan" class="btn btn-primary shadow btn-sm sharp mr-1"><i class="fa fa-chevron-left"></i></a>
        <div class="card">
            <div class="container-fluid">
                <div class="form-head align-items-center d-flex mb-sm-4 mb-3">
                    <div class="mr-auto">
                        <h2 class="text-black font-w600">Perubahan Pengadaan</h2>
                        <p class="mb-0"> </p>
                    </div>
                </div>
        <div class="modal-body">
            @foreach ($data_pengadaan as $data)
            <form action="/editpengadaan/{{$data->id_pengadaan}}/edit" method="post">
                {{ csrf_field() }}
                <div class="form-group row">
                    <label for="#" class="col-sm-2 col-form-label text-black font-w500">Pengadaan di PBF</label>

                    <div class="col-sm-10">
                        <select class="form-control selectpicker" id="#" name="id_pbf" data-live-search="true" required>
                            @foreach($data_pbf as $pbf)
                                @if($pbf->id_pbf == $data->pbf)
                                    <option data-tokens="algk" value="{{$pbf->id_pbf}}" selected>{{$pbf->nama_PBF}}</option>
                                @else
                                    <option data-tokens="algk" value="{{$pbf->id_pbf}}">{{$pbf->nama_PBF}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                </div>
                <input name="id_pengadaan" value='{{$data->id_pengadaan}}' class="datepicker-default form-control" id="#"
                     placeholder="Pilih Tanggal" hidden>
                <div class="form-group row">
                    <label for="#" class="col-sm-2 col-form-label text-black font-w500">Tanggal</label>
                    <div class="col-sm-10">
                        <input name="tanggal" value='{{$data->tanggal_pengadaan}}' required class="datepicker-default form-control" id="datepicker"
                         placeholder="Pilih Tanggal">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="#" class="col-sm-2 col-form-label text-black font-w500">Waktu Pengadaan</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" value="{{$data->waktu_pengadaan}}" name="waktu_pengadaan" required id="#" placeholder="Ketik waktu pengadaan">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="#" class="col-sm-2 col-form-label text-black font-w500">Lead Time</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{$data->leadtime}}" id="#" placeholder="Lead Time" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="#" class="col-sm-2 col-form-label text-black font-w500">Jumlah Hari</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{$data->jumlah_hari}}" name="jumlah_hari" id="#" placeholder="Ketik Jumlah Hari">
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
                    
                    @foreach($data_pengadaan_detail as $data_detail)
                        <div class="row font-weight-bold pb-md-4" id="row_user_table{{$loop->iteration}}">
                            <div class="col">
                                <select class="form-select selectpicker" id="#" name="pabrik[]" required data-live-search="true">
                                    <option disabled value="" selected>Pilih Pabrik</option>
                                    @foreach($data_pabrik as $pabrik)
                                        <option data-tokens="algk" @if($pabrik->id_pabrik == $data_detail->pabrik) selected @endif value="{{$pabrik->id_pabrik}}">{{$pabrik->nama_pabrik}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <select class="form-select selectpicker" required id="#" name="obat[]" data-live-search="true">
                                    <option disabled value="" selected>Pilih obat</option>
                                    @foreach($data_obat as $obat)
                                        <option data-tokens="algk" @if($obat->id == $data_detail->id_obat) selected @endif value="{{$obat->id}}">{{$obat->nama_dagang_obat}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <input type="number" class="form-control"
                                            placeholder="Ketik Harga" value="{{$data_detail->harga}}" name="harga[]" id="element">
                            </div>
                            
                            <div class="col">
                                <input type="number" class="form-control"
                                                placeholder="Kebutuhan Obat" value="{{$data_detail->jumlah_kebutuhan_obat}}" name="kebutuhan_obat[]" id="element">
                            </div>
                            
                            <div class="col">
                                @if($loop->iteration == 1)
                                    <button class="btn btn-primary btn-sm btn-fill "
                                        name="add_table" id="add_table">+</button>
                                @else
                                    <button class="btn btn-secondary btn-sm btn-fill btn_remove" id="{{$loop->iteration}}" name="remove" >x</button>
                                @endif
                                
                            </div>
                        </div>
                    @endforeach
                    
                </div>
                
                
                {{-- <div class="table-responsive">
                   
                        <span id="result"></span>
                        <table class="table table-bordered " id="user_table">
                            <thead>
                                <tr>
                                    <th width="0,9%">Pabrik</th>
                                    <th width="0,9%">ID Obat</th>
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
                                @foreach($data_pengadaan_detail as $data_detail)
                                <tr id="row_user_table{{$loop->iteration}}">
                                    <td>
                                        <select class="form-select selectpicker" id="#" name="pabrik[]" data-live-search="true">
                                            <option disabled>Pilih Pabrik</option>
                                            @foreach($data_pabrik as $pabrik)
                                                <option data-tokens="algk" @if($pabrik->id_pabrik == $data_detail->pabrik) selected @endif value="{{$pabrik->id_pabrik}}">{{$pabrik->nama_pabrik}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-select selectpicker" id="#" name="obat[]" data-live-search="true">
                                            <option disabled selected>Pilih obat</option>
                                            @foreach($data_obat as $obat)
                                                <option data-tokens="algk" @if($obat->id == $data_detail->id_obat) selected @endif value="{{$obat->id}}">{{$obat->nama_dagang_obat}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control"
                                            placeholder="Ketik Harga" value="{{$data_detail->harga}}" name="harga[]" id="element">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control"
                                            placeholder="Auto" value="{{$data_detail->CA}}" name="CA[]" id="element" disabled>

                                    </td>
                                    <td>
                                        <input type="text" class="form-control"
                                            placeholder="Kebutuhan Obat" value="{{$data_detail->jumlah_kebutuhan_obat}}" name="kebutuhan_obat[]" id="element">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control"
                                            placeholder="Auto" value="{{$data_detail->stok_minimal}}" name="stok_min[]" id="element" disabled>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control"
                                            placeholder="Auto" value="{{$data_detail->sisa_stok}}" name="sisa_stok[]" id="element" disabled>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control"
                                            placeholder="Auto" value="{{$data_detail->CT}}" name="CT[]" id="element" disabled>
                                    </td>
                                    <td>
                                        @if($loop->iteration == 1)
                                        <button class="btn btn-primary btn-sm btn-fill pull-left"
                                            name="add_table" id="add_table">+</button>
                                        @else
                                        <button class="btn btn-secondary btn-sm btn-fill btn_remove" id="{{$loop->iteration}}" name="remove" >x</button>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    
                    
                </div> --}}

                <div class="row">
                    &emsp;
                    <div class="form-group">
                        <button  type="text" class="btn btn-primary btn-sm">Edit</button>
                    </div>
                    &emsp;                                        
                    <div class="form-group">
                        <a href="/halpengadaan" type="text" class="btn btn-secondary btn-sm">Batal</a>
                    </div>
                </div>
            </form>
            @endforeach
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            var i = 2;
            $('#add_table').click(function(e) {
                e.preventDefault();
                e.stopPropagation();
                i++;
                $('#user_table').append('<div class="row pb-md-4" id="row_user_table' + i +
                    '"><div class="col"><select class="form-select selectpicker" id="#" name="pabrik[]" data-live-search="true"><option disabled selected>Pilih Pabrik</option>@foreach($data_pabrik as $data)<option data-tokens="algk" value="{{$data->id_pabrik}}">{{$data->nama_pabrik}}</option>@endforeach</select></div><div class="col"><select class="form-select selectpicker" id="#" name="obat[]" data-live-search="true"><option disabled selected>Pilih obat</option>@foreach($data_obat as $data)<option data-tokens="algk" value="{{$data->id}}">{{$data->nama_dagang_obat}} ({{$data->expired_date}})</option>@endforeach</select></div><div class="col"><input type="text" class="form-control"placeholder="Ketik Harga" name="harga[]" id="element"></div><div class="col"><input type="text" class="form-control"placeholder="Kebutuhan Obat" name="kebutuhan_obat[]" id="element"></div><div class="col"><button class="btn btn-secondary btn-sm btn-fill btn_remove ms-1" id="' +
                    i + '" name="remove" >x</button></div></div>');
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
