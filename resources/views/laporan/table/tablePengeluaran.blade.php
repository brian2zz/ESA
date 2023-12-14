<table id="datatable" class="table table-responsive-md">
    <thead>
        <tr>

            <th><strong>Tanggal</strong></th>
            <th><strong>Nama Dokter</strong></th>
            <th><strong>Nomor Resep</strong></th>
            <th><strong>Nomor Batch&nbsp;</strong></th>
            <th><strong>Nama Obat</strong></th>
            <th><strong>Dosis Obat</strong></th>
            <th><strong>Total Pengeluaran</strong></th>
            
        </tr>
    </thead>
    <tbody>
        @foreach ($data_pengeluaran as $data)
            <tr>
                <td>{{ $data->tanggal_pengeluaran}}</td>
                <td>@if($data->nama_dokter == null) - @else{{ $data->nama_dokter}}@endif</td>
                <td>{{ $data->no_resep}}</td>
                <td>{{ $data->batch_number }}</td>
                <td>{{ $data->nama_dagang_obat }}</td>
                <td>{{ $data->jumlah_dosis_obat }}{{ $data->nama_dosis }}</td>
                <td>{{ $data->jumlah_obat_keluar }}</td>
                
            </tr>
        @endforeach
    </tbody>
</table>
<table id="export_laporan_pengeluaran" class="table table-responsive-md" hidden>
    <thead>
        <tr>
            <th><strong>Tanggal</strong></th>
            <th><strong>Nama Dokter</strong></th>
            <th><strong>Nomor Resep</strong></th>
            <th><strong>Nomor Batch&nbsp;</strong></th>
            <th><strong>Nama Obat</strong></th>
            <th><strong>Dosis Obat</strong></th>
            <th><strong>Total Pengeluaran</strong></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data_pengeluaran as $data)
            <tr>
                <td>{{ $data->tanggal_pengeluaran}}</td>
                <td>@if($data->nama_dokter == null) - @else{{ $data->nama_dokter}}@endif</td>
                <td>{{ $data->no_resep}}</td>
                <td>{{ $data->batch_number }}</td>
                <td>{{ $data->nama_dagang_obat }}</td>
                <td>{{ $data->jumlah_dosis_obat }}{{ $data->nama_dosis }}</td>
                <td>{{ $data->jumlah_obat_keluar }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
