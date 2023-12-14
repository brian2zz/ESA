<table id="example5" class="table table-responsive-md">
    <thead>
        <tr>
            
            <th><strong>Tanggal</strong></th>
            <th><strong>Pabrik</strong></th>
            <th><strong>Nama Obat</strong></th>
            <th><strong>Dosis</strong></th>
            <th><strong>Satuan</strong></th>
            <th><strong>Harga</strong></th>
            <th><strong>CA</strong></th>
            <th><strong>Kebutuhan <br> Obat</strong></th>
            <th><strong>Stok <br> Min</strong></th>
            <th><strong>Sisa <br> Stok</strong></th>
            <th><strong>CT</strong></th>
        </tr>
    </thead>
    <tbody>
        @foreach($data_pengadaan as $data)
        <tr>
            
            <td>{{$data->tanggal_pengadaan}}</td>
            <td>{{$data->nama_pabrik}}</td>
            <td>{{$data->nama_dagang_obat}}</td>
            <td>{{$data->dosis_obat}}</td>
            <td>{{$data->nama_satuan_obat}}</td>
            <td>{{$data->harga}}</td>
            <td>{{$data->CA}}</td>
            <td>{{$data->jumlah_kebutuhan_obat}}</td>
            <td>{{$data->stok_minimal}}</td>
            <td>{{$data->sisa_stok}}</td>
            <td>{{$data->CT}}</td>
            
            
        </tr>
    
        @endforeach
    </tbody>
</table>