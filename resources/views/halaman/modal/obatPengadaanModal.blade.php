<div class="modal fade" id="obatPengadaan">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Penerimaan</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <table class="table table-borderless">
                        <thead>
                            <th>Nama Obat</th>
                            <th>Tanggal Diterima</th>
                            <th>Tanggal Expired</th>
                            <th>Harga Beli</th>
                            <th>Harga Jual</th>
                            <th>Stok</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($data_obat as $Obat)
                            <input type="hidden" name="id_gudang" value="{{$Obat->id}}">
                            <tr>
                                <td>{{$Obat->nama_dagang_obat}}</td>
                                <td>{{$Obat->tanggal_batch_diterima}}</td>
                                <td>{{$Obat->expired_date}}</td>
                                <td>{{$Obat->harga_beli}}</td>
                                <td>{{$Obat->harga_jual}}</td>
                                <td>{{$Obat->stok}}</td>
                                <td><a href="/tambahpengadaan/{{}}" >
                                    <button type="button" id="select" class="btn btn-warning btn-xs"
                                    >Select</button></td>
                                </a>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $("#select").on("click", function (e) {
            const id = $(this).data('id'); 
            $('#id_gudang').val(id);
            $('#nama_obat')
        });
    });

</script>