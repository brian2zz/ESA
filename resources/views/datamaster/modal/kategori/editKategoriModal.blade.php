@foreach($data_kategori as $data)
<div class="modal fade" id="editKelolaKatagori{{$data->id_kategori}}">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Kelola Katagori</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/kelolakatagori/edit" method="post" >
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="#" class="col-sm-2 col-form-label text-black font-w500">ID
                            Katagori</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="id_kategori" value="{{$data->id_kategori}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-sm-2 col-form-label text-black font-w500">Nama
                            Kategori</label>
                            <div class="col-sm-10">
                                <input type="text" name='nama_kategori' value="{{$data->nama_kategori}}" required class="form-control" id="#" placeholder="kategori">
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