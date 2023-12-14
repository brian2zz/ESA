@foreach ($data_pbf as $detail)
    <div class="modal fade" id="detailPbf{{ $detail->id_pbf }}">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title">Detail PBF</h5>

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
                                            <label class="text-black font-w500">Nama PBF</label>
                                        </td>
                                        <td>
                                            <span class="text-black font-w300">{{ $detail->nama_PBF }}</span>
                                        </td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="form-group">
                                        <td>
                                            <label class="text-black font-w500">Alamat PBF</label>
                                        </td>
                                        <td>
                                            <span class="text-black font-w300">{{ $detail->alamat_PBF }}</span>
                                        </td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="form-group">
                                        <td>
                                            <label class="text-black font-w500">No. Telp PBF</label>
                                        </td>
                                        <td>
                                            <span class="text-black font-w300">{{ $detail->no_tlp_PBF }}</span>
                                        </td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="form-group">
                                        <td>
                                            <label class="text-black font-w500">Nama PIC</label>
                                        </td>
                                        <td>
                                            <span class="text-black font-w300">{{ $detail->nama_PIC }}</span>
                                        </td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="form-group">
                                        <td>
                                            <label class="text-black font-w500">No. Telp PIC</label>
                                        </td>
                                        <td>
                                            <span class="text-black font-w300">{{ $detail->no_tlp_PIC }}</span>
                                        </td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="form-group">
                                        <td>
                                            <label class="text-black font-w500">Bank</label>
                                        </td>
                                        <td>
                                            <span class="text-black font-w300">{{ $detail->bank }}</span>
                                        </td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="form-group">
                                        <td>
                                            <label class="text-black font-w500">No. Rekening PBF</label>
                                        </td>
                                        <td>
                                            <span class="text-black font-w300">{{ $detail->nomer_rekening }}</span>
                                        </td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="form-group">
                                        <td>
                                            <label class="text-black font-w500">Lead Time</label>
                                        </td>
                                        <td>
                                            <span class="text-black font-w300">{{ $detail->leadtime }}</span>
                                        </td>
                                    </div>
                                </tr>
                            </tbody>
                        </table>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-responsive-md table_detail">
                                    <thead>
                                        <tr>
                                            <th><strong>Batch Number</strong></th>
                                            <th><strong>Nama Obat</strong></th>
                                            <th><strong>Tanggal Beli</strong></th>
                                            <th><strong>Expired Date</strong></th>
                                            <th><strong>Total Harga Beli</strong></th>
                                            <th><strong>Jumlah Diterima</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($penerimaan as $data_penerimaan)
                                            @if ($data_penerimaan->id_pbf == $detail->id_pbf)
                                                <tr>
                                                    <td><span
                                                            class="text-black font-w300">{{ $data_penerimaan->batch_number }}</span>
                                                    </td>
                                                    <td><span
                                                            class="text-black font-w300">{{ $data_penerimaan->nama_dagang_obat }}</span>
                                                    </td>
                                                    <td><span
                                                            class="text-black font-w300">{{ $data_penerimaan->tanggal_penerimaan }}</span>
                                                    </td>
                                                    <td><span
                                                            class="text-black font-w300">{{ $data_penerimaan->tanggal_expired_obat }}</span>
                                                    </td>
                                                    <td><span
                                                            class="text-black font-w300">{{ $data_penerimaan->total_harga_beli }}</span>
                                                    </td>
                                                    <td><span
                                                            class="text-black font-w300">{{ $data_penerimaan->jumlah_obat_diterima }}</span>
                                                    </td>
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
