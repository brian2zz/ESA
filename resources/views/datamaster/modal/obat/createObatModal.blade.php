<div class="modal fade" id="addObat">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Obat</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/obat/create" method="post">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        {{-- <label for="#" class="col-sm-2 col-form-label text-black font-w500">ID Obat</label>
                        <div class="col-sm-10">
                            <input readonly type="text" name="id_obat" class="form-control" id="#" value="{{$id_obat}}" >
                        </div> --}}
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-sm-2 col-form-label text-black font-w500">Nama Dagang
                            Obat</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama_obat" required class="form-control" id="#"
                                placeholder="Nama">
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label for="#" class="col-sm-2 col-form-label text-black font-w500">Kandungan</label>
                        <div class="col-sm-10">
                            <table class="table table-borderless" id=DragDrop>
                                <tbody>

                                    <tr>
                                        <td>
                                            {{-- <input type="text" class="form-control"
                                                placeholder="Ketik Kandungan" name="element[]" id="element"> --}}
                                            <div class="row">

                                                <select class="form-control selectpicker" data-width="350px"
                                                    name="element[]" id="element" data-live-search="true">
                                                    <option value="" selected disabled>Pilih Kandungan</option>
                                                    @foreach ($data_kandungan as $data)
                                                        <option data-tokens="algk" value="{{ $data->id_kandungan }}">
                                                            {{ $data->nama_kandungan }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="col-sm-2">
                                                    <input type="text" name="jumlah_dosis_kandungan[]"
                                                        class="form-control" id="#" placeholder="dosis">
                                                </div>
                                                <div class="col-sm-1.5">
                                                    <select class="form-control selectpicker" name="satuan_dosis_kandungan[]"
                                                        id="#">
                                                        @foreach ($satuan_dosis as $Satuan_dosis)
                                                            <option data-tokens="algk"
                                                                value="{{ $Satuan_dosis->id_dosis }}">
                                                                {{ $Satuan_dosis->nama_dosis }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <button class="btn btn-primary btn-md btn-fill" name="add_element"
                                                    id="add_element">+</button>
                                            </div>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-sm-2 col-form-label text-black font-w500">Dosis
                            Obat</label>
                        <div class="col-sm-5">
                            <input type="number" name="Dosis_obat" required class="form-control" id="#"
                                placeholder="Dosis">
                        </div>
                        <div class="col-sm-1.5">
                            <select class="form-control selectpicker" name="satuan_dosis" id="#">
                                @foreach ($satuan_dosis as $Satuan_dosis)
                                    <option data-tokens="algk" value="{{ $Satuan_dosis->id_dosis }}">
                                        {{ $Satuan_dosis->nama_dosis }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-sm-2 col-form-label text-black font-w500">Satuan
                            Obat</label>
                        <div class="col-sm-5">
                            <select class="form-control selectpicker" required name="satuan_obat" id="#"
                                {{-- data-live-search="true" --}}>
                                <option disabled value="" selected>Pilih Satuan</option>
                                @foreach ($satuan_obat as $satuan)
                                    <option data-tokens="algk" value="{{ $satuan->id_satuan_obat }}">
                                        {{ $satuan->nama_satuan_obat }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-sm-2 col-form-label text-black font-w500">Nama
                            Kategori</label>
                        <div class="col-sm-10">
                            <select class="form-control selectpicker" required name="Kategori" id="#">
                                <option disabled value="" selected>Pilih Kategori</option>
                                @foreach ($kategori_obat as $kategori)
                                    <option data-tokens="algk" value="{{ $kategori->id_kategori }}">
                                        {{ $kategori->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-sm-2 col-form-label text-black font-w500">Nama
                            Golongan</label>
                        <div class="col-sm-6">
                            <select class="form-control selectpicker" required name="golongan_obat" id="#"
                                {{-- data-live-search="true" --}}>
                                <option disabled value="" selected>Pilih Golongan</option>
                                @foreach ($golongan_obat as $golongan)
                                    <option data-tokens="bb" value="{{ $golongan->id_golongan }}">
                                        {{ $golongan->nama_golongan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-sm-2 col-form-label text-black font-w500">Nama
                            Pabrik</label>
                        <div class="col-sm-6">
                            <select class="form-control selectpicker" required name="Nama_pabrik" id="#">
                                <option disabled value="" selected>Pilih Pabrik</option>
                                @foreach ($pabrik_obat as $pabrik)
                                    <option data-tokens="algk" value="{{ $pabrik->id_pabrik }}">
                                        {{ $pabrik->nama_pabrik }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="#" class="col-sm-2 col-form-label text-black font-w500">Status</label>
                        <div class="col-sm-6">
                            <select name="status" required class="form-control selectpicker" id="#"
                                {{-- data-live-search="true" --}}>
                                <option data-tokens="C" value="Continue">Continue</option>
                                <option data-tokens="D" value="Discontinue">Discontinue</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        &emsp;
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
                        </div>
                        &emsp;
                        <div class="form-group">
                            <button type="text" data-dismiss="modal"
                                class="btn btn-secondary btn-sm">Batal</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
