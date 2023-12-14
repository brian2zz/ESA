@foreach($table_obat as $data_obat)
<div class="modal fade" id="detailObat{{$data_obat->id_obat}}"role="dialog">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Obat</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    {{ csrf_field() }}
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <div class="form-group">
                                    <th>
                                        <label class="text-black font-w500">ID Obat</label>
                                    </th>
                                    <td>
                                        <span class="text-black font-w300">{{$data_obat->id_obat}}</span>
                                    </td>
                                </div>
                            </tr>
                            <tr>
                                <div class="form-group">
                                    <th>
                                        <label class="text-black font-w500">Nama Dagang Obat</label>
                                    </th>
                                    <td>
                                        <span class="text-black font-w300">{{$data_obat->nama_dagang_obat}}</span>
                                    </td>
                                </div>
                            </tr>
                            <tr>
                                <div class="form-group">
                                    <th>
                                        <label class="text-black font-w500">Kandungan</label>
                                    </th>
                                    <td>
                                        @foreach ($obat as $data)
                                            @if( $data->id_obat == $data_obat->id_obat )     
                                                <span class="text-black font-w300">
                                                    -{{$data->nama_kandungan}} {{ $data->jumlah_dosis_kandungan }}{{ $data->nama_dosis }}
                                                </span><br>
                                            @endif
                                        @endforeach
                                    </td>
                                </div>
                            </tr>
                            
                            <tr>
                                <div class="form-group">
                                    <th>
                                        <label class="text-black font-w500">Dosis</label>
                                    </th>
                                    <td>
                                        <span class="text-black font-w300">{{$data_obat->jumlah_dosis_obat}} {{$data_obat->nama_dosis}}</span>                                              
                                    </td>
                                </div>
                            </tr>
                            <tr>
                                <div class="form-group">
                                    <th>
                                        <label class="text-black font-w500">Satuan Obat</label>
                                    </th>
                                    <td>
                                        <span class="text-black font-w300"> {{$data_obat->nama_satuan_obat}}</span>
                                    </td>
                                </div>
                            </tr>
                            <tr>
                                <div class="form-group">
                                    <th>
                                        <label class="text-black font-w500">Nama Katagori</label>
                                    </th>
                                    <td>
                                        <span class="text-black font-w300">{{$data_obat->nama_kategori}}</span>
                                    </td>
                                </div>
                            </tr>
                            <tr>
                                <div class="form-group">
                                    <th>
                                        <label class="text-black font-w500">Nama Golongan</label>
                                    </th>
                                    <td>
                                        <span class="text-black font-w300">{{$data_obat->nama_golongan}}</span>
                                    </td>
                                </div>
                            </tr>
                            <tr>
                                <div class="form-group">
                                    <th>
                                        
                                        <label class="text-black font-w500">Nama Pabrik</label>
                                    </th>
                                    <td>
                                        <span class="text-black font-w300">{{$data_obat->nama_pabrik}}</span>
                                    </td>
                                </div>
                            </tr>
                            <tr>
                                <div class="form-group">
                                    <th>
                                        
                                        <label class="text-black font-w500">Status</label>
                                    </th>
                                    <td>
                                        <span class="text-black font-w300">{{$data_obat->status}}</span>
                                    </td>
                                </div>
                            </tr>
                        </tbody>
                    </table>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatableGudangObat" class="table table-responsive-md table_detail">
                                <thead>
                                    <tr>
                                        <th><strong>Tanggal Beli</strong></th>
                                        <th><strong>Expired Date</strong></th>
                                        <th><strong>Harga Beli</strong></th>
                                        <th><strong>Harga Jual</strong></th>
                                        <th><strong>Stok</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($table_detail_obat as $gudang)
                                    @if($gudang->id_obat == $data_obat->id_obat)
                                        <tr>
                                            <td><span @if($gudang->expired_status == "true") 
                                                class="text-red font-w300"
                                                @else class="text-black font-w300"
                                                @endif
                                                >{{$gudang->tanggal_penerimaan}}</span></td>

                                            <td><span @if($gudang->expired_status == "true") 
                                                class="text-red font-w300"
                                                @else class="text-black font-w300"
                                                @endif>{{$gudang->tanggal_expired_obat}}</span></td>

                                            <td><span @if($gudang->expired_status == "true") 
                                                class="text-red font-w300"
                                                @else class="text-black font-w300"
                                                @endif>{{$gudang->harga_beli_satuan}}</span></td>

                                            <td><span @if($gudang->expired_status == "true") 
                                                class="text-red font-w300"
                                                @else class="text-black font-w300"
                                                @endif>{{$gudang->harga_jual}}</span></td>

                                            <td><span @if($gudang->expired_status == "true") 
                                                class="text-red font-w300"
                                                @else class="text-black font-w300"
                                                @endif>
                                                    @if($gudang->id_history_gudang == null)
                                                        {{$gudang->jumlah_obat_diterima}}
                                                    @else 
                                                        {{ $gudang->stok }}
                                                    @endif
                                                </span>
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
