@foreach ($data_pbf as $pbf)
<div class="modal fade" id="editPbf{{ $pbf->id_pbf }}">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit PBF</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/pbf/edit" method="post">
                    {{ csrf_field() }}
                    <input type="text" class="form-control" name="id_pbf" value="{{ $pbf->id_pbf }}" id="pass_id_pbf" hidden>
                    <div class="form-group row">
                        <label for="#" class="col-sm-3 col-form-label text-black font-w500">Nama PBF</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $pbf->nama_PBF }}" required id="#" name="nama_pbf" placeholder="Nama">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="#" class="col-sm-3 col-form-label text-black font-w500">Alamat</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $pbf->alamat_PBF }}" required id="#" name="alamat_pbf" placeholder="Alamat">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-sm-3 col-form-label text-black font-w500">No. Telp PBF</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $pbf->no_tlp_PBF }}" required id="#" name="telp_pbf" placeholder="Nomor">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-sm-3 col-form-label text-black font-w500">Nama PIC</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $pbf->nama_PIC }}" required id="#" name="nama_pic" placeholder="Nama">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-sm-3 col-form-label text-black font-w500">No. Telp PIC</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $pbf->no_tlp_PBF }}" required id="#" name="telp_pic" placeholder="Nomor">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-sm-3 col-form-label text-black font-w500">Bank</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $pbf->bank }}" required id="#" name="bank" placeholder="Bank">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-sm-3 col-form-label text-black font-w500">No. Rekening PBF</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $pbf->nomer_rekening }}" required id="#" name="rek_pbf" placeholder="Nomor">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-sm-3 col-form-label text-black font-w500">Lead Time</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="{{ $pbf->leadtime }}" required id="#" name="leadtime_pbf" placeholder="Time">
                        </div>
                    </div>
                    <div class="row">
                        &emsp;
                        <div class="form-group">
                            <button type="text" class="btn btn-primary btn-sm">Edit</button>
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
@endforeach