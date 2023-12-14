<div class="modal fade" id="addStok">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Stok</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/stok/create" method="post">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="#" class="col-sm-2 col-form-label text-black font-w500">Tanggal Masuk
                            </label>
                        <div class="col-sm-10">
                            <input name="tanggal_masuk" class="datepicker-default form-control" id="datepicker"
                                placeholder="Pilih Tanggal">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-sm-2 col-form-label text-black font-w500">Nama
                            Obat</label>
                        <div class="col-sm-10">
                            <select class="form-control selectpicker" name="id_obat" id="#" data-live-search="true">
                                <option selected disabled>Pilih Obat</option>
                                @foreach($data_obat as $data)
                                    <option data-tokens="algk" value="{{$data->ID}}">{{$data->nama_dagang_obat}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-sm-2 col-form-label text-black font-w500">Jumlah Tambah Stok</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="#" name="jumlah" placeholder="Jumlah Stok">
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
        </div>
    </div>
</div>