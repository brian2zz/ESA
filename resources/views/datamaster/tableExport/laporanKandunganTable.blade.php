<table>
    <thead>
        <tr>
            
            <th><strong>No</strong></th>
            <th><strong>Nama Obat</strong></th>
            <th><strong>Dosis Obat</strong></th>
            <th><strong>Satuan</strong></th>
            <th><strong>Kandungan dan Dosis</strong></th>
            
            
        </tr>
    </thead>
    <tbody>
        @foreach($obat as $data)
        <tr>
            
            <td>{{$loop->iteration}}</td>
            <td>
                {{$data->nama_dagang_obat}}
            </td>
                <td>{{$data->jumlah_dosis_obat}}{{ $data->nama_dosis }}</td>
                <td>{{$data->nama_satuan_obat}}</td>
                <td>
                    @foreach($kandungan_obat as $kandungan)
                        @if($kandungan->id_obat == $data->id_obat)
                            -{{ $kandungan->nama_kandungan }} {{ $kandungan->jumlah_dosis_kandungan }}
                            {{ $kandungan->nama_dosis }}<br><br>
                        @endif
                    @endforeach
                </td>
        </tr>
        @endforeach
    </tbody>
</table>