@foreach($data_table as $penerimaan)
    <div class="modal fade" id="detailHalPenerimaan{{ $penerimaan->id_penerimaan }}">
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
                            <tbody>
                                <tr>
                                    <div class="form-group">
                                        <td>
                                            <label class="text-black font-w500">Tanggal</label>
                                        </td>
                                        <td>
                                            <span class="text-black font-w300">{{ $penerimaan->tanggal_penerimaan }}</span>
                                        </td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="form-group">
                                        <td>
                                            <label class="text-black font-w500">Nama PBF</label>
                                        </td>
                                        <td>
                                            <span class="text-black font-w300">{{ $penerimaan->nama_PBF }}</span>
                                        </td>
                                    </div>
                                </tr>
                                
                            </tbody>
                        </table>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-responsive-md">
                                    <thead>
                                        <tr>
                                            <th><strong>Batch Number</strong></th>
                                            <th><strong>Nama Obat</strong></th>
                                            <th><strong>Tanggal Expired</strong></th>
                                            <th><strong>Dosis Obat</strong></th>
                                            <th><strong>Satuan Obat</strong></th>
                                            <th><strong>Jumlah Diterima</strong></th>
                                            <th><strong>Harga Beli Satuan</strong></th>
                                            <th><strong>Total Harga Beli</strong></th>
                                            <th><strong>Harga Jual</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data_detail as $detail)
                                            @if($detail->id_penerimaan == $penerimaan->id_penerimaan)
                                                <tr>
                                                    <td>{{ $detail->batch_number }}</td>
                                                    <td>{{ $detail->nama_dagang_obat }}</td>
                                                    <td>{{ $detail->tanggal_expired_obat }}</td>
                                                    <td>{{ $detail->jumlah_dosis_obat }} {{ $detail->nama_dosis }}</td>
                                                    <td>{{ $detail->nama_satuan_obat }}</td>
                                                    <td>{{ $detail->jumlah_obat_diterima }}</td>
                                                    <td>{{ $detail->harga_beli_satuan }}</td>
                                                    <td>{{ $detail->total_harga_beli }}</td>
                                                    <td>{{ $detail->harga_jual }}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach