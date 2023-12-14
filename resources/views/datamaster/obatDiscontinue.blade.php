{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>


{{-- add --}}
<script>
    $(document).ready(function() {
        var i = 1;
        $('#add_element').click(function(e) {
            e.preventDefault();
            e.stopPropagation();
            i++;
            $('#DragDrop').append('<tr id="row_DragDrop' + i +
            '"><td><select class="form-control selectpicker" data-width="900px" name="element[]" id="element" data-live-search="true"><option selected disabled>Pilih Kandungan</option>@foreach($data_kandungan as $data)<option data-tokens="algk" value="{{$data->id_kandungan}}">{{$data->nama_kandungan}}</option>@endforeach</select></td><td><button class="btn btn-secondary btn-sm btn-fill btn_remove" id="' +
                i + '" name="remove" >x</button></td></tr>');
                $('.selectpicker').selectpicker('render');
            });
        // <input type="text" class="form-control" placeholder="Ketik Kandungan" name="element[]" id="element">
        $(document).on('click', '.btn_remove', function(e) {
            e.preventDefault();
            e.stopPropagation();
            var button_id = $(this).attr("id");
            $('#row_DragDrop' + button_id + '').remove();
        });
    });
</script>

{{-- edit --}}
<script>
    $(document).ready(function() {
        var i = 1;
        $('#edit_element').click(function(e) {
            e.preventDefault();
            e.stopPropagation();
            i++;
            $('#EditDragDrop').append('<tr id="row_EditDragDrop' + i +
                '"><td><select class="form-control selectpicker" data-width="900px" name="element[]" id="element" data-live-search="true"><option selected disabled>Pilih Kandungan</option>@foreach($data_kandungan as $data)<option data-tokens="algk" value="{{$data->id_kandungan}}">{{$data->nama_kandungan}}</option>@endforeach</select></td><td><button class="btn btn-secondary btn-sm btn-fill btn_remove" id="' +
                i + '" name="remove" >x</button></td></tr>');
                $('.selectpicker').selectpicker('render');
        });
        // <input type="text" class="form-control" placeholder="Ketik Kandungan" name="element[]" id="element">
        $(document).on('click', '.btn_remove', function(e) {
            e.preventDefault();
            e.stopPropagation();
            var button_id = $(this).attr("id");
            $('#row_EditDragDrop' + button_id + '').remove();
        });
    });
</script>

{{-- editTable --}}
<script>
    $(document).ready(function() {
        var i = 1;
        $('#add_table').click(function(e) {
            e.preventDefault();
            e.stopPropagation();
            i++;
            $('#user_table').append('<tr id="row_user_table' + i +
                '"><td><input type="text" class="form-control" placeholder="Tanggal Beli" name="element[]" id="element"></td><td><input type="text" class="form-control" placeholder="Tanggal Expired" name="element[]" id="element"></td><td><input type="text" class="form-control" placeholder="Harga Beli" name="element[]" id="element"></td><td><input type="text" class="form-control" placeholder="Harga Jual" name="element[]" id="element"></td><td><input type="text" class="form-control" placeholder="Stok" name="element[]" id="element"></td><td><input type="text" class="form-control" placeholder="Status" name="element[]" id="element"></td><td><button class="btn btn-secondary btn-sm btn-fill btn_remove" id="' +
                i + '" name="remove" >x</button></td></tr>');
        });
        $(document).on('click', '.btn_remove', function(e) {
            e.preventDefault();
            e.stopPropagation();
            var button_id = $(this).attr("id");
            $('#row_user_table' + button_id + '').remove();
        });
    });
</script>
    <!-- row -->
    <div class="col-lg-12">
        {{-- <a href="/kandungan" class="btn btn-primary mr-3 btn-sm">Kembali</a> --}}
        <a href="/obat" class="btn btn-primary shadow btn-sm sharp mr-1"><i class="fa fa-chevron-left"></i></a>
        <div class="card">
            <div class="container-fluid">
                
                @if(Auth::user()->role == 'penanggung_jawab')
                    @include('datamaster.modal.obat.editObatModal')
                @endif
                @include('datamaster.modal.obat.detailObatModal')

                <div class="card-header">
                    <h4 class="card-title">Obat Discontinue</h4>
                    
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th class="width50">
                                        <div class="custom-control custom-checkbox checkbox-success check-lg mr-3">
                                            <input type="checkbox" class="custom-control-input" id="checkAll" required="">
                                            <label class="custom-control-label" for="checkAll"></label>
                                        </div>
                                    </th>
                                    <th><strong>ID Obat</strong></th>
                                    <th><strong>Nama Dagang Obat</strong></th>
                                    <th><strong>Kandungan</strong></th>
                                    <th><strong>Dosis Obat</strong></th>
                                    <th><strong>Satuan</strong></th>
                                    <th><strong>Nama Golongan</strong></th>
                                    <th class="text-center"><strong>Action</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($table_obat as $Obat)
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox checkbox-success check-lg mr-3">
                                            <input type="checkbox" class="custom-control-input" id="customCheckBox2"
                                                required="">
                                            <label class="custom-control-label" for="customCheckBox2"></label>
                                        </div>
                                    </td>
                                    <td>{{ $Obat->ID }}</td>
                                    <td>
                                        {{ $Obat->nama_dagang_obat}}
                                    </td>
                                    <td>
                                        {{$Obat->nama_kandungan}}
                                    </td>
                                    
                                    {{-- <td style="display:none;">
                                        
                                        @foreach ($obat as $data)
                                            @if( $data->id_kandungan_obat == $Obat->id_kandungan_obat )
                                                -{{$data->kandungan}}<br>
                                            @endif
                                        @endforeach
                                    </td> --}}
                                    
                                    <td>{{ $Obat->dosis_obat }}</td>
                                    <td>{{ $Obat->nama_satuan_obat }}</td>
                                    <td>{{ $Obat->nama_golongan }}</td>
                                    <td>
                                        {{-- <div class="dropdown ml-auto text-center"> --}}
                                            <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1 edit" data-toggle="modal"
                                            data-target="#editObat{{ $Obat->ID }}" 
                                           
                                               ><i class="fa fa-pencil"></i></a>

                                            <a href="#" class="btn btn-secondary shadow btn-xs sharp" data-toggle="modal"
                                                data-target="#detailObat{{ $Obat->ID }}" 
                                               
                                                ><i class="fa fa-eye"></i></a>
                                                {{-- <button type="button" data-toggle="modal" data-target-id="{{ $Obat->ID}}" data-target="#modelName">Button name </button> --}}
                                        {{-- </div> --}}
                                    </td>
                                </tr>

                                

                                @endforeach
                            </tbody>   
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

  

    <script type="text/javascript">
        $(document).ready(function(){
            var table = $('#datatable').DataTable();

          
        });
    </script>

<script>
    $(document).ready(function () {
        $("#editObat").on("show.bs.modal", function (e) {
            const id = $(e.relatedTarget).data('obat-id');
            const nama = $(e.relatedTarget).data('obat-nama');
            const idKandungan = $(e.relatedTarget).data('kandunganid');
            const dosis = $(e.relatedTarget).data('obat-dosis').replace(/\D/g, "");
            const satuan = $(e.relatedTarget).data('obat-satuan');
            const kategori = $(e.relatedTarget).data('obat-kategori');
            const golongan = $(e.relatedTarget).data('obat-golongan');
            const pabrik = $(e.relatedTarget).data('obat-pabrik');
            const tglbeli = $(e.relatedTarget).data('obat-tglbeli');
            const tglexpired = $(e.relatedTarget).data('obat-tglexpired');
            const hrgbeli = $(e.relatedTarget).data('obat-hrgbeli');
            const hrgjual = $(e.relatedTarget).data('obat-hrgjual');
            const stok = $(e.relatedTarget).data('obat-stok');
            const status = $(e.relatedTarget).data('obat-status');
            $('#pass_id').val(id);
            $('#pass_nama').val(nama);
            $('#pass_idKandungan').val(idKandungan);
            $('#pass_dosis').val(dosis);
            $('#pass_satuan').val(satuan);
            $('#pass_kategori').val(kategori);
            $('#pass_golongan').val(golongan);
            $('#pass_pabrik').val(pabrik);
            $('#pass_tglbeli').val(tglbeli);
            $('#pass_tglexpired').val(tglexpired);
            $('#pass_hrgbeli').val(hrgbeli);
            $('#pass_hrgjual').val(hrgjual);
            $('#pass_stok').val(stok);
            $('#pass_status').val(status);
        });
    });

</script>
<script>

    $(document).ready(function () {
        $("#detailObat").on("show.bs.modal", function (e) {
            const id = $(e.relatedTarget).data('id');
            const nama = $(e.relatedTarget).data('nama');
            const kandungan = $(e.relatedTarget).data('kandungan');
            const dosis = $(e.relatedTarget).data('dosis');
            const satuan = $(e.relatedTarget).data('satuan');
            const kategori = $(e.relatedTarget).data('kategori');
            const golongan = $(e.relatedTarget).data('golongan');
            const pabrik = $(e.relatedTarget).data('pabrik');
            const tglbeli = $(e.relatedTarget).data('tglbeli');
            const tglexpired = $(e.relatedTarget).data('tglexpired');
            const hrgbeli = $(e.relatedTarget).data('hrgbeli');
            const hrgjual = $(e.relatedTarget).data('hrgjual');
            const stok = $(e.relatedTarget).data('stok');
            const status = $(e.relatedTarget).data('status');
            $('#passing_id').text(id);
            $('#passing_nama').text(nama);
            $('#passing_kandungan').text(kandungan);
            $('#passing_dosis').text(dosis);
            $('#passing_satuan').text(satuan);
            $('#passing_kategori').text(kategori);
            $('#passing_golongan').text(golongan);
            $('#passing_pabrik').text(pabrik);
            $('#passing_tglbeli').text(tglbeli);
            $('#passing_tglexpired').text(tglexpired);
            $('#passing_hrgbeli').text(hrgbeli);
            $('#passing_hrgjual').text(hrgjual);
            $('#passing_stok').text(stok);
            $('#passing_status').text(status);
        });
    });

</script>
@endsection
