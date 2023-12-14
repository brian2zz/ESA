@extends('layout.default')



{{-- Content --}}
@section('content')
    <div class="col-lg-12">
        {{-- <a href="/golongan" class="btn btn-primary mr-3 btn-sm">Kembali</a> --}}
        <a href="/halpengadaan" class="btn btn-primary shadow btn-sm sharp mr-1"><i class="fa fa-chevron-left"></i></a>
        <div class="card">
            <div class="container-fluid">
                <div class="form-head align-items-center d-flex mb-sm-4 mb-3">
                    <div class="mr-auto">
                        <h2 class="text-black font-w600">Detail Pengadaan</h2>
                        <p class="mb-0"> </p>
                    </div>
                </div>
                
                
                <div class="card-body">
                    <div class="table-responsive">
                        <form>
                            <table class="table table-borderless">
                                <tbody>
                                    @foreach ($data_pengadaan as $data)
                                    <tr>
                                        <div class="form-group">
                                            <td>
                                                <label class="text-black font-w500">Pengadaan di PBF</label>
                                            </td>
                                            <td>
                                                <label class="text-black font-w300">{{$data->nama_PBF}}</label>
                                            </td>
                                        </div>
                                    </tr>
                                    <tr>
                                        <div class="form-group">
                                            <td>
                                                <label class="text-black font-w500">Tanggal</label>
                                            </td>
                                            <td>
                                                <label class="text-black font-w300">{{$data->tanggal_pengadaan}}</label>
                                            </td>
                                        </div>
                                    </tr>
                                    <tr>
                                        <div class="form-group">
                                            <td>
                                                <label class="text-black font-w500">Waktu Pengadaan</label>
                                            </td>
                                            <td>
                                                <label class="text-black font-w300">{{$data->waktu_pengadaan}}</label>
                                            </td>
                                        </div>
                                    </tr>
                                    <tr>
                                        <div class="form-group">
                                            <td>
                                                <label class="text-black font-w500">Lead Time</label>
                                            </td>
                                            <td>
                                                <label class="text-black font-w300">{{$data->leadtime}}</label>
                                            </td>
                                        </div>
                                    </tr>
                                    
                                    <tr>
                                        <div class="form-group">
                                            <td>
                                                <label class="text-black font-w500">Jumlah Hari</label>
                                            </td>
                                            <td>
                                                <label class="text-black font-w300">{{$data->jumlah_hari}}</label>
                                            </td>
                                        </div>
                                    </tr>
                                </tbody>
                            </table>
                            @endforeach
                        </form>
                        <table id="example5" class="table table-responsive-md">
                            <thead>
                                <tr>
                                   
                                    <th><strong>Pabrik</strong></th>
                                    <th><strong>Nama Obat</strong></th>
                                    
                                    <th><strong>Harga</strong></th>
                                    <th><strong>CA</strong></th>
                                    <th><strong>Kebutuhan Obat</strong></th>
                                    <th><strong>Stok Min</strong></th>
                                    <th><strong>Sisa Stok</strong></th>
                                    <th><strong>CT</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data_pengadaan_detail as $data)
                                <tr>
                                    
                                    <td>{{$data->nama_pabrik}}</td>
                                    <td>{{$data->nama_dagang_obat}}</td>
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
                    </div>
                </div>
            </div>
        </div>
    @endsection
