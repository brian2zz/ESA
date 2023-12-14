<table id="laporan_kategori" class="table table-responsive-md">
    <thead>
        <tr>
            <th><strong>ID</strong></th>
            <th><strong>Nama Obat</strong></th>
            <th><strong>Dosis</strong></th>
            <th><strong>Satuan</strong></th>
            <th><strong>Katagori</strong></th>
            <th><strong>Golongan</strong></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data_laporan as $data)
        <tr>
            <td>{{$data->id_obat}}</td>
            <td>
                <div class="d-flex align-items-center"> <span aria-rowspan="2"
                        class="w-space-no">{{$data->nama_dagang_obat}}</span>
                </div>
            </td>
            <td>{{$data->jumlah_dosis_obat}} {{ $data->nama_dosis }}</td>
            <td>{{$data->nama_satuan_obat}}</td>
            <td>{{$data->nama_kategori}}</td>
            <td>{{$data->nama_golongan}}</td>
        </tr>
        @endforeach
        
    </tbody>
</table>

<table id="laporan_kategori_export" hidden class="table table-responsive-md">
    <thead>
        <tr>
            <th><strong>ID Obat</strong></th>
            <th><strong>Nama Obat</strong></th>
            <th><strong>Dosis</strong></th>
            <th><strong>Satuan</strong></th>
            <th><strong>Katagori</strong></th>
            <th><strong>Golongan</strong></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data_laporan as $data)
        <tr>
            
            <td>{{$data->id_obat}}</td>
            <td>{{$data->nama_dagang_obat}}
            </td>
            <td>{{$data->jumlah_dosis_obat}} {{ $data->nama_dosis }}</td>
            <td>{{$data->nama_satuan_obat}}</td>
            <td>{{$data->nama_kategori}}</td>
            <td>{{$data->nama_golongan}}</td>
        </tr>
        @endforeach
        
    </tbody>
</table>