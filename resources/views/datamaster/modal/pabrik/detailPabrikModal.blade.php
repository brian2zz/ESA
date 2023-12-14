@foreach ($data_pabrik as $data)
    <div class="modal fade" id="detailPabrik{{ $data->id_pabrik }}">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Pabrik</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="container-fluid">
                        <div class="row mb-3">
                            <div class="col-sm-5"><label class="text-black font-w500">Nama Pabrik</label></div>
                            <div class="col-sm"><label class="text-black font-w300">{{ $data->nama_pabrik }}</label>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-5"><label class="text-black font-w500">Alamat Pabrik</label></div>
                            <div class="col-sm"><label class="text-black font-w300">{{ $data->alamat_pabrik }}</label>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-5"><label class="text-black font-w500">No. Telp Pabrik</label></div>
                            <div class="col-sm"><label class="text-black font-w300">{{ $data->no_telp_pabrik }}</label>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="tableObatPabrik" class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th><strong>Nama Obat</strong></th>
                                        <th><strong>Dosis Obat</strong></th>
                                        <th><strong>Satuan Obat</strong></th>
                                        <th><strong>Kandungan</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_obat as $obat)
                                        @if ($data->id_pabrik == $obat->id_pabrik)
                                            <tr>
                                                <td>{{ $obat->nama_dagang_obat }}</td>
                                                <td>{{ $obat->jumlah_dosis_obat}} {{ $obat->nama_dosis }}</td>
                                                <td>{{ $obat->nama_satuan_obat }}</td>
                                                <td>
                                                    @foreach ($kandungan_obat as $kandungan)
                                                    @if( $obat->id_obat == $kandungan->id_obat )     
                                                        <span class="text-black font-w300">
                                                            -{{$kandungan->nama_kandungan}} {{ $kandungan->jumlah_dosis_kandungan }}{{ $kandungan->nama_dosis }}
                                                        </span><br>
                                                    @endif
                                                    @endforeach
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endforeach
