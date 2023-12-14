@php($modal = 1)
@foreach ($table_obat as $obat)
    <div class="modal fade" tabindex="-1" role="dialog" id="editObat{{ $obat->id_obat }}">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Obat</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <form action="/obat/edit" method="post" id="editForm">
                    {{ csrf_field() }}

                    <div class="modal-body">
                        {{-- <input type="text" class="form-control" value="{{ $obat->id_obat_kandungan }}"
                            name="id_kandungan_obat" hidden> --}}
                        <div class="form-group row">
                            <label for="#" class="col-sm-2 col-form-label text-black font-w500">ID Obat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="{{ $obat->id_obat }}" name="id"
                                    readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="#" class="col-sm-2 col-form-label text-black font-w500">Nama Dagang
                                Obat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama_obat" required
                                    value="{{ $obat->nama_dagang_obat }}" placeholder="Nama">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="#" class="col-sm-2 col-form-label text-black font-w500">Kandungan</label>
                            <div class="col-sm-10">
                                <table class="table table-borderless" id='EditDragDrop{{ $modal }}'>
                                    <tbody>
                                        @php($i = 0)
                                        @foreach ($kandungan as $Kandungan)
                                            @if ($Kandungan->id_obat == $obat->id_obat)
                                                <tr id="row_EditDragDrop{{ $modal }}_{{ $i }}">
                                                    <td>
                                                        <div class="row">
                                                            <select class="form-control selectpicker" data-width="500px"
                                                                name="element[]" id="element" data-live-search="true">
                                                                <option value="">Pilih Kandungan</option>
                                                                @foreach ($data_kandungan as $data)
                                                                    <option data-tokens="algk"
                                                                        @if ($Kandungan->id_kandungan == $data->id_kandungan) selected @endif
                                                                        value="{{ $data->id_kandungan }}">
                                                                        {{ $data->nama_kandungan }}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="col-sm-2">
                                                                <input type="text" name="jumlah_dosis_kandungan[]" 
                                                                    value="{{ $Kandungan->jumlah_dosis_kandungan }}"
                                                                    class="form-control" id="#"
                                                                    placeholder="dosis">
                                                            </div>
                                                            <div class="col-sm-1.5">
                                                                <select class="form-control selectpicker"
                                                                    name="satuan_dosis_kandungan[]" id="#">
                                                                    @foreach ($satuan_dosis as $Satuan_dosis)
                                                                        <option data-tokens="algk"  @if($Kandungan->id_dosis == $Satuan_dosis->id_dosis) selected @endif
                                                                            value="{{ $Satuan_dosis->id_dosis }}">
                                                                            {{ $Satuan_dosis->nama_dosis }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            @if ($i == 0)
                                                                <button class="btn btn-primary btn-md btn-fill btn_edit"
                                                                    name="edit_element" id="{{ $modal }}">+</button>
                                                            @else
                                                                <button
                                                                    class="btn btn-secondary m-1 btn-md btn-fill btn_remove"
                                                                    id="{{ $modal }}_{{ $i }}" name="remove">x</button>
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                                @php($i++)
                                            @endif
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="#" class="col-sm-2 col-form-label text-black font-w500">Dosis
                                Obat</label>
                            @foreach ($dosis_obat as $dosis)
                                @if ($obat->id_obat == $dosis->id_obat)
                                    <div class="col-sm-5">
                                        <input type="number" name="Dosis_obat" class="form-control" required
                                            value="{{ $dosis->jumlah_dosis_obat }}" placeholder="Dosis">
                                    </div>
                                    <div class="col-sm-1.5">
                                        <select class="form-control selectpicker" name="satuan_dosis_edit"
                                            id="#">
                                            @foreach ($satuan_dosis as $Satuan_dosis)
                                                <option data-tokens="algk"
                                                    @if ($dosis->id_dosis == $Satuan_dosis->id_dosis) selected @endif
                                                    value="{{ $Satuan_dosis->id_dosis}}">
                                                    {{ $Satuan_dosis->nama_dosis }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="form-group row">
                           
                            <label for="#" class="col-sm-2 col-form-label text-black font-w500">Satuan
                                Obat</label>
                            <div class="col-sm-5">
                                <select class="form-control selectpicker" name="satuan_obat" required
                                    id="#" data-live-search="true">
                                    <option disabled value="" selected>Pilih Satuan</option>
                                    
                                        @foreach ($satuan_obat as $satuan)
                                            <option data-tokens="algk"
                                                @if ($obat->id_satuan_obat == $satuan->id_satuan_obat) selected @endif
                                                value="{{ $satuan->id_satuan_obat }}">
                                                {{ $satuan->nama_satuan_obat }}
                                            </option>
                                        @endforeach
                                    
                                </select>
                            </div>
                               
                        </div>
                        <div class="form-group row">
                            <label for="#" class="col-sm-2 col-form-label text-black font-w500">Nama
                                Kategori</label>
                            <div class="col-sm-10">
                                <select class="form-control selectpicker" name="Kategori" required id="#"
                                    data-live-search="true">
                                    <option disabled value="" selected>Pilih Kategori</option>
                                    @foreach ($kategori_obat as $kategori)
                                        <option data-tokens="algk" @if ($obat->id_kategori == $kategori->id_kategori) selected @endif
                                            value="{{ $kategori->id_kategori }}">{{ $kategori->nama_kategori }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="#" class="col-sm-2 col-form-label text-black font-w500">Nama
                                Golongan</label>
                            <div class="col-sm-6">
                                <select class="form-control selectpicker" required name="golongan_obat"
                                    id="#" data-live-search="true">
                                    <option disabled value="" selected>Pilih Golongan</option>
                                    @foreach ($golongan_obat as $golongan)
                                        <option data-tokens="bb" @if ($obat->id_golongan == $golongan->id_golongan) selected @endif
                                            value="{{ $golongan->id_golongan }}">{{ $golongan->nama_golongan }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="#" class="col-sm-2 col-form-label text-black font-w500">Nama
                                Pabrik</label>
                            <div class="col-sm-6">
                                <select class="form-control selectpicker" required name="pabrik" id="#">
                                    <option disabled value="" selected>Pilih Pabrik</option>
                                    @foreach ($pabrik_obat as $pabrik)
                                        <option data-tokens="algk" @if ($obat->id_pabrik == $pabrik->id_pabrik) selected @endif
                                            value="{{ $pabrik->id_pabrik }}">{{ $pabrik->nama_pabrik }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="#" class="col-sm-2 col-form-label text-black font-w500">Status</label>
                            <div class="col-sm-6">
                                <select name="status" required class="form-control selectpicker" id="#"
                                    {{-- data-live-search="true" --}}>
                                    <option data-tokens="D" @if ($obat->status == 'Discontinue') selected @endif
                                        value="Discontinue">Discontinue
                                    </option>
                                    <option data-tokens="C" @if ($obat->status == 'Continue') selected @endif
                                        value="Continue">Continue
                                    </option>
                                </select>

                            </div>
                        </div>

                        <div class="row">
                            &emsp;
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm">edit</button>
                            </div>
                            &emsp;
                            <div class="form-group">
                                <button type="text" data-dismiss="modal"
                                    class="btn btn-secondary btn-sm">Batal</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
    @php($modal++)
@endforeach

