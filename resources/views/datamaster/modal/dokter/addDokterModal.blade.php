<div class="modal fade" id="addDokter">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Kandungan</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/dokter/create" method="post">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="#" class="col-sm-2 col-form-label text-black font-w500">Nama
                            Dokter</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="#" name="nama_Dokter" placeholder="Nama" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-sm-2 col-form-label text-black font-w500">SIP Dokter</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="#" name="sip_dokter" placeholder="SIP Dokter" required>
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