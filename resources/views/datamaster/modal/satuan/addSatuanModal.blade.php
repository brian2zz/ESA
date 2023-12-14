<div class="modal fade" id="addSatuan">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Satuan</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="satuan/create" method="post">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="#" class="col-sm-2 col-form-label text-black font-w500">ID
                            Satuan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="#" name="id_satuan" value="{{$id_satuan}}"readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-sm-2 col-form-label text-black font-w500">Nama Satuan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama_satuan" id="#" placeholder="Satuan">
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