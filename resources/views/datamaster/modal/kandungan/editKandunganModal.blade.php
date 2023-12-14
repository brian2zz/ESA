@foreach ($data_kandungan as $data)
    <div class="modal fade" id="editKandungan{{ $data->id_kandungan }}">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Kandungan</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/kandungan/edit" method="post">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="#" class="col-sm-2 col-form-label text-black font-w500">Nama
                                Kandungan Obat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="#"
                                    value="{{ $data->nama_kandungan }}" name="nama_kandungan" placeholder="Nama">
                            </div>
                            <input type="text" class="form-control" name="id_kandungan" value="{{$data->id_kandungan}}" hidden>
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
