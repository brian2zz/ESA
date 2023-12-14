<table id="table_laporan_ED" class="table table-responsive-md">
    <thead>
        <tr>
            
            
            <th><strong>Nomor Batch</strong></th>
            <th><strong>Nama Obat</strong></th>
            <th><strong>Dosis Obat</strong></th>
            <th><strong>Tanggal ED</strong></th>
            <th><strong>Jumlah</strong></th>

        </tr>
    </thead>
    <tbody>
        @foreach ($obat_ed as $data)
        <tr>
            
            <td>{{$data->batch_number}}</td>
            <td>{{$data->nama_dagang_obat}}</td>
            <td>{{$data->jumlah_dosis_obat}} {{ $data->nama_dosis }}</td>
            <td style="color: red;">{{$data->tanggal_expired_obat}}</td>
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

<table id="export_laporan_ED" class="table table-responsive-md" hidden>
    <thead>
        <tr>
            <th><strong>Nomor Batch</strong></th>
            <th><strong>Nama Obat</strong></th>
            <th><strong>Dosis Obat</strong></th>
            <th><strong>Tanggal ED</strong></th>
            <th><strong>Jumlah</strong></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($obat_ed as $data)
        <tr>
            
            <td>{{$data->batch_number}}</td>
            <td>{{$data->nama_dagang_obat}}</td>
            <td>{{$data->jumlah_dosis_obat}} {{ $data->nama_dosis }}</td>
            <td style="color: red;">{{$data->tanggal_expired_obat}}</td>
            <td>@if ($data->stok == null){{ $data->jumlah_obat_diterima }}@else{{ $data->stok }}@endif</td>
        </tr>
        @endforeach
    </tbody>
</table>