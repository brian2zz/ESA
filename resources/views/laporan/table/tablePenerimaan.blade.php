<table id="table_laporan_penerimaan" class="table table-responsive-md">
    <thead>
        <tr>

           
            <th><strong>Tanggal Penerimaan</strong></th>
            <th><strong>Nama Obat</strong></th>
            <th><strong>Nomor Batch</strong></th>
            <th><strong>Tanggal Expired</strong></th>
            <th><strong>Jumlah Diterima</strong></th>
            <th><strong>Harga Beli</strong></th>
            <th><strong>Total Harga</strong></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data_detail as $data)
            <tr>
                <td>{{ $data->tanggal_penerimaan }}</td>
                <td>{{ $data->nama_dagang_obat }}</td>
                <td>{{ $data->batch_number }}</td>
                <td>{{ $data->tanggal_expired_obat }}</td>
                <td>{{ $data->jumlah_obat_diterima }}</td>
                <td>{{ $data->harga_beli_satuan }}</td>
                <td>{{ $data->total_harga_beli }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<table id="export_laporan_penerimaan" class="table table-responsive-md" hidden>
    <thead>
        <tr>

           
            <th><strong>Tanggal Penerimaan</strong></th>
            <th><strong>Nama Obat</strong></th>
            <th><strong>Nomor Batch</strong></th>
            <th><strong>Tanggal Expired</strong></th>
            <th><strong>Jumlah Diterima</strong></th>
            <th><strong>Harga Beli</strong></th>
            <th><strong>Total Harga</strong></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data_detail as $data)
            <tr>
                <td>{{ $data->tanggal_penerimaan }}</td>
                <td>{{ $data->nama_dagang_obat }}</td>
                <td>{{ $data->batch_number }}</td>
                <td>{{ $data->tanggal_expired_obat }}</td>
                <td>{{ $data->jumlah_obat_diterima }}</td>
                <td>{{ $data->harga_beli_satuan }}</td>
                <td>{{ $data->total_harga_beli }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
