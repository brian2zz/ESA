<div class="modal fade" id="addDosis">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Dosis</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/dosis/create" method="post">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="#" class="col-sm-2 col-form-label text-black font-w500">ID
                            Dosis</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="id_dosis" id="#" value="{{$id_dosis}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-sm-2 col-form-label text-black font-w500">Dosis</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="dosis" id="#" placeholder="Dosis">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-sm-2 col-form-label text-black font-w500">Dosis
                            Obat</label>
                        
                        <div class="col-sm-2">
                            <select class="form-control selectpicker" name="satuan_dosis" id="#" {{-- data-live-search="true" --}}>
                                <option data-tokens="algk" value="mg">mg</option>
                                <option data-tokens="atbk" value="ml">ml</option>
                            </select>
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