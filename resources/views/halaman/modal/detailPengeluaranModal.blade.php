@foreach ($detail_pengeluaran as $data)
    <div class="modal fade" id="detailHalPengeluaran{{$data->id_pengeluaran}}">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Pengeluaran</h5>
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
                                            {{$data->tanggal_pengeluaran}}
                                        </td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="form-group">
                                        <td>
                                            <label class="text-black font-w500">Nama Dokter</label>
                                        </td>
                                        <td>
                                            @if($data->nama_dokter == null) - @else {{$data->nama_dokter}} @endif
                                        </td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="form-group">
                                        <td>
                                            <label class="text-black font-w500">Nomor Resep</label>
                                        </td>
                                        <td>
                                            {{$data->no_resep}}
                                        </td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="form-group">
                                        <td>
                                            <label class="text-black font-w500">Racikan</label>
                                        </td>
                                        <td>
                                            @if($data->racikan == 'true')
                                                Racikan
                                            @else
                                                Non Racikan
                                            @endif
                                        </td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="form-group">
                                        <td>
                                            <label class="text-black font-w500">Timestamp Resep Diterima</label>
                                        </td>
                                        <td>
                                            {{$data->resep_diterima}}
                                        </td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="form-group">
                                        <td>
                                            <label class="text-black font-w500">Timestamp Resep Keluar</label>
                                        </td>
                                        <td>
                                            {{$data->resep_dikeluarkan}}
                                        </td>
                                    </div>
                                </tr>
                                
                            </tbody>
                        </table>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatableGudangObat" class="table table-responsive-md">
                                    <thead>
                                        <tr>
                                            <th><strong>Nomor Batch</strong></th>
                                            <th><strong>Obat</strong></th>
                                            <th><strong>Satuan</strong></th>
                                            <th><strong>Dosis</strong></th>
                                            <th><strong>Jumlah</strong></th>
                                            <th><strong>Tata Cara Pemakaian</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($detail_pengeluaran as $Detail)
                                        @if($Detail->id_pengeluaran == $data->id_pengeluaran)
                                            <tr>
                                                <td><span class="text-black font-w300"    
                                                    >{{$Detail->batch_number}}</span></td>
                                                <td><span class="text-black font-w300"    
                                                    >{{$Detail->nama_dagang_obat}}</span></td>
                                                <td><span class="text-black font-w300"
                                                    >{{$Detail->nama_satuan_obat}}</span></td>
                                                <td><span class="text-black font-w300"
                                                    >{{$Detail->jumlah_dosis_obat}} {{$Detail->nama_dosis}}</span></td>
                                                <td><span class="text-black font-w300"
                                                    >{{$Detail->jumlah_obat_keluar}}</span></td>
                                                <td><span class="text-black font-w300"
                                                    >{{$Detail->tata_cara_pemakaian}}</span></td>
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