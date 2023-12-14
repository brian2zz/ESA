<div class="modal fade" id="addStokOpnam">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Stok Opnam</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/stok-opnam/create" method="post">
                    {{ csrf_field() }}
                    <input type="text" class="form-control" name="id_stok_opnam" value="{{ $id_stok_opnam }}"
                                hidden>
                    <div class="form-group row">
                        <label for="#" class="col-sm-3 col-form-label text-black font-w500">Tanggal
                            Stok Opnam</label>
                        <div class="col-xl-9">
                            <input name="tanggal_stok_opnam" required class="datepicker-default form-control"
                                id="datepicker" placeholder="Pilih Tanggal">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-sm-3 col-form-label text-black font-w500">Obat</label>
                        <div class="col-sm-9">
                            <select class="form-control selectpicker" name="batch_number" required
                                data-live-search="true">
                                <option value="" selected disabled>Pilih Obat</option>
                                @foreach ($tambah_obat as $Obat)
                                    <option data-tokens="algk" value="{{ $Obat->batch_number }}">{{ $Obat->batch_number }} - {{ $Obat->nama_dagang_obat }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-sm-3 col-form-label text-black font-w500">Rekonsiliasi</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="#" name="rekonsiliasi" required
                                placeholder="Jumlah">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-sm-3 col-form-label text-black font-w500">Keterangan</label>
                        <div class="col-sm-9"> 
                            <textarea rows="4" class="form-control" id="#" name="keterangan"
                                placeholder="Keterangan" required></textarea>
                        </div>
                    </div>
                    <div class="row">
                        &emsp;
                        <div class="form-group">
                            <button type="text" class="btn btn-primary btn-sm">Tambah</button>
                        </div>
                        &emsp;
                        <div class="form-group">
                            <button type="text" data-dismiss="modal" class="btn btn-secondary btn-sm">Batal</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
