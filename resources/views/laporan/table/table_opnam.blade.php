<table id="datatable" class="table table-responsive-md">
    <thead>
        <tr>
            <th><strong>Nomor Batch</strong></th>
            <th><strong>Tanggal Penerimaan</strong></th>
            <th><strong>Nama Obat</strong></th>
            <th><strong>Dosis Obat</strong></th>
            <th><strong>Jumlah rekonsiliasi</strong></th>
            <th><strong>Jumlah Stok Obat</strong></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data_stok_opnam as $data)
            <tr>

                <td>{{ $data->batch_number }}</td>
                <td>{{ $data->tanggal_opnam }}</td>
                <td>
                    <div class="d-flex align-items-center"> <span aria-rowspan="2"
                            class="w-space-no">{{ $data->nama_dagang_obat }}</span>
                    </div>
                </td>
                <td>{{ $data->jumlah_dosis_obat }} {{ $data->nama_dosis }}</td>
                <td>{{ $data->rekonsiliasi }}</td>
                <td>{{ $data->stok }}</td>
            </tr>
        @endforeach
    </tbody>

</table>

<table id="export_laporan_opnam" class="table table-responsive-md" hidden>
    <thead>
        <tr>
            <th><strong>Nomor Batch</strong></th>
            <th><strong>Tanggal Penerimaan</strong></th>
            <th><strong>Nama Obat</strong></th>
            <th><strong>Dosis Obat</strong></th>
            <th><strong>Jumlah rekonsiliasi</strong></th>
            <th><strong>Jumlah Stok Obat</strong></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data_stok_opnam as $data)
            <tr>

                <td>{{ $data->batch_number }}</td>
                <td>{{ $data->tanggal_opnam }}</td>
                <td>{{ $data->nama_dagang_obat }}</td>
                <td>{{ $data->jumlah_dosis_obat }} {{ $data->nama_dosis }}</td>
                <td>{{ $data->rekonsiliasi }}</td>
                <td>{{ $data->stok }}</td>
            </tr>
        @endforeach
    </tbody>

</table>