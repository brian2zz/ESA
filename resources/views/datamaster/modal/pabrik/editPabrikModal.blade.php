@foreach($data_pabrik as $data)
<div class="modal fade" id="editPabrik{{$data->id_pabrik}}">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Pabrik</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/pabrik/edit" method="POST">
                    {{ csrf_field() }}
                    <input type="text" class="form-control" required value="{{$data->id_pabrik}}" name='id_pabrik' hidden>
                    <div class="form-group row">
                        <label for="#" class="col-sm-2 col-form-label text-black font-w500">Nama Pabrik</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" required value="{{$data->nama_pabrik}}" required name="nama_pabrik" placeholder="Nama">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-sm-2 col-form-label text-black font-w500">Alamat Pabrik</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" required value="{{$data->alamat_pabrik}}" required name="alamat_pabrik" placeholder="Alamat">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-sm-2 col-form-label text-black font-w500">No. Telp Pabrik</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" required value="{{$data->no_telp_pabrik}}" required name="telp_pabrik" placeholder="Nomor">
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