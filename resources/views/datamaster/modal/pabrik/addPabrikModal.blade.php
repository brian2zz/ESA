<div class="modal fade" id="addPabrik">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Pabrik</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="pabrik/create" method="post">
                    {{ csrf_field() }}
                    <div class="form-group row">
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-sm-2 col-form-label text-black font-w500">Nama Pabrik</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" required id="#" name="nama_pabrik" placeholder="Nama">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-sm-2 col-form-label text-black font-w500">Alamat Pabrik</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" required id="#" name="alamat_pabrik" placeholder="Alamat">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-sm-2 col-form-label text-black font-w500">No. Telp Pabrik</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" required id="#" name="telp_pabrik" placeholder="Nomor">
                        </div>
                    </div>
                    <div class="row">
                        &emsp;
                        <div class="form-group">
                            <button type="text" class="btn btn-primary btn-sm">Tambah</button>
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