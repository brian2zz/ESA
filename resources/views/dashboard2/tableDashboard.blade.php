<table id="table_dashboard" class="table table-responsive-md">
    <thead>
        <tr>
            <th><strong>Batch Number</strong></th>
            <th><strong>Nama Obat</strong></th>
            <th><strong>Expired Date</strong></th>
            <th><strong>Jumlah <br> Terima</strong></th>
            <th><strong>Total <br>Pengeluaran </strong></th>
            <th><strong>Sisa <br> Stok</strong></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dashboard as $data)
            <tr>
                <td>
                    {{ $data->batch_number }}
                </td>

                <td>
                    <div class="d-flex align-items-center">{{ $data->nama_dagang_obat }}
                    </div>
                </td>
                <td @if($data->expired_status == "true") 
                    style="color: red;"
                    @endif>
                    {{ $data->tanggal_expired_obat }}
                </td>
                <td>
                    {{ $data->jumlah_obat_diterima }}
                </td>
                <td>
                    @foreach ($data_pengeluaran as $pengeluaran)
                        @if ($pengeluaran->id_detail_penerimaan == $data->id_detail_penerimaan)
                            {{ $pengeluaran->total_obat_keluar }}
                        @endif
                    @endforeach
                </td>
                <td>
                    @if ($data->stok == null)
                        {{ $data->jumlah_obat_diterima }}
                    @else
                        {{ $data->stok }}
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<table id="table_dashboard_export" class="table table-responsive-md" hidden>
    <thead>
        <tr>
            <th><strong>Batch Number</strong></th>
            <th><strong>Nama Obat</strong></th>
            <th><strong>Expired Date</strong></th>
            <th><strong>Jumlah Terima</strong></th>
            <th><strong>Total Pengeluaran </strong></th>
            <th><strong>Sisa Stok</strong></th>
        </tr>
    </thead>
    <tbody>
       @foreach ($dashboard as $data)
            <tr>
                <td>{{ $data->batch_number }}</td>

                <td>{{ $data->nama_dagang_obat }}</td>
                <td>{{ $data->tanggal_expired_obat }}</td>
                <td>{{ $data->jumlah_obat_diterima }}</td>
                <td>@foreach ($data_pengeluaran as $pengeluaran)@if ($pengeluaran->id_detail_penerimaan == $data->id_detail_penerimaan){{ $pengeluaran->total_obat_keluar }}@endif @endforeach</td>
                <td>@if ($data->stok == null){{ $data->jumlah_obat_diterima }}@else{{ $data->stok }} @endif</td>
            </tr>
        @endforeach
    </tbody>
</table>
