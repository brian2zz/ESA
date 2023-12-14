{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">



    <!-- row -->

    <div class="col-lg-12">
        <div class="card">
            <div class="container-fluid">
                <div class="form-head align-items-center d-flex mb-sm-4 mb-3">
                    <div class="mr-auto">
                        <h2 class="text-black font-w600">Obat</h2>
                        <p class="mb-0"> </p>
                    </div>
                </div>



                @if (Auth::user()->role == 'penanggung_jawab')
                    @include('datamaster.modal.obat.createObatModal')
                    @include('datamaster.modal.obat.editObatModal')
                @endif

                <div class="card-header">
                    <h4 class="card-title">Daftar Master Obat</h4>
                    <div class="row">
                        @if ($status == 'Continue')
                            <a href="/obat/discontinue" class="btn btn-primary mr-3 btn-sm" class="fa fa-shopping-cart">Obat
                                Discontinue</a>
                            <a href="javascript:void(0)" class="btn btn-primary mr-3 btn-sm" class="fa fa-shopping-cart"
                                data-toggle="modal" data-target="#addObat">Tambah</a>
                        @else
                            <a href="/obat" class="btn btn-primary mr-3 btn-sm" class="fa fa-shopping-cart">Obat
                                Continue</a>
                        @endif

                    </div>
                </div>
                <div class="card-header">
                    <div class="form-row">
                        <form action="/obat/search" method="post">
                            {{ csrf_field() }}
                            <input name="status" value="{{ $status }}" hidden>
                            <div class="form-row">
                                <a><select class="form-control selectpicker" name='kategori' data-width="200px"
                                        id="#">
                                        <option data-tokens="algk" selected value="">Pilih Category</option>
                                        @foreach ($kategori_obat as $kategori)
                                            <option value="{{ $kategori->id_kategori }}">{{ $kategori->nama_kategori }}
                                            </option>
                                        @endforeach
                                    </select></a>
                                &ensp;
                                <a><select class="form-control selectpicker" name="golongan" data-width="200px"
                                        id="#">
                                        <option data-tokens="algk" selected value="">Pilih Golongan</option>
                                        @foreach ($golongan_obat as $golongan)
                                            <option value="{{ $golongan->id_golongan }}">{{ $golongan->nama_golongan }}
                                            </option>
                                        @endforeach
                                    </select></a>
                                &ensp;
                                <button type="text" class="btn btn-primary mr-3 btn-m"><i
                                        class="fa fa-search"></i></button>

                                &ensp;
                            </div>
                        </form>
                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th class="width50">
                                        <div class="custom-control custom-checkbox checkbox-success check-lg mr-3">
                                            <input type="checkbox" class="custom-control-input" id="checkAll"
                                                required="">
                                            <label class="custom-control-label" for="checkAll"></label>
                                        </div>
                                    </th>
                                    <th><strong>ID Obat</strong></th>
                                    <th><strong>Nama Dagang Obat</strong></th>
                                    {{-- <th><strong>Kandungan</strong></th> --}}
                                    <th><strong>Dosis Obat</strong></th>
                                    <th><strong>Kategori</strong></th>
                                    <th><strong>Nama Golongan</strong></th>
                                    <th class="text-center"><strong>Action</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($table_obat as $Obat)
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox checkbox-success check-lg mr-3">
                                                <input type="checkbox" class="custom-control-input" id="customCheckBox2"
                                                    required="">
                                                <label class="custom-control-label" for="customCheckBox2"></label>
                                            </div>
                                        </td>
                                        <td>{{ $Obat->id_obat }}</td>
                                        <td>
                                            {{ $Obat->nama_dagang_obat }}
                                        </td>

                                        {{-- <td>
                                        {{$Obat->nama_kandungan}}
                                    </td> --}}

                                        <td>{{ $Obat->jumlah_dosis_obat }} {{ $Obat->nama_dosis }}</td>
                                        <td>{{ $Obat->nama_kategori }}</td>
                                        <td>{{ $Obat->nama_golongan }}</td>
                                        <td>
                                            <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1 edit"
                                                data-toggle="modal" data-target="#editObat{{ $Obat->id_obat }}"><i
                                                    class="fa fa-pencil"></i></a>

                                            <button class="btn btn-secondary shadow btn-xs sharp btn_detail"
                                                data-toggle="modal" data-target="#detailObat{{ $Obat->id_obat }}" value="{{ $Obat->id_obat }}"><i
                                                    class="fa fa-eye"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                        @include('datamaster.modal.obat.detailObatModal')

                        {{-- @endforeach --}}


                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function(){
            var table = $('#datatable').DataTable();
        });
    </script>
    
    <script>
        $(document).ready(function(){
            $('.table_detail').DataTable();
        });
    </script>


    {{-- add --}}
    <script>
        $(document).ready(function() {
            var i = 1;
            $('#add_element').click(function(e) {
                e.preventDefault();
                e.stopPropagation();
                i++;
                $('#DragDrop').append('<tr id="row_DragDrop' + i +'">'+
                    '<td>'+
                        '<div class="row">'+
                            '<select class="form-control selectpicker" data-width="350px" name="element[]" id="element" data-live-search="true">'+
                                '<option selected disabled>Pilih Kandungan</option>'+
                                '@foreach($data_kandungan as $data)'+
                                    '<option data-tokens="algk" value="{{$data->id_kandungan}}">{{$data->nama_kandungan}}</option>'+
                                '@endforeach'+
                            '</select>'+
                            '<div class="col-sm-2">'+
                                '<input type="text" name="jumlah_dosis_kandungan[]" required class="form-control" id="#" placeholder="dosis">'+
                            '</div>'+
                            '<div class="col-sm-1.5">'+
                                '<select class="form-control selectpicker" name="satuan_dosis_kandungan[]" id="#">'+
                                    '@foreach ($satuan_dosis as $Satuan_dosis)'+
                                        '<option data-tokens="algk" value="{{ $Satuan_dosis->id_dosis }}" > {{ $Satuan_dosis->nama_dosis }}</option>'+
                                    '@endforeach'+
                                '</select>'+
                            '</div>'+
                            '<button class="btn btn-secondary btn-md btn-fill btn_remove" id="' +i+ '" name="remove" >x</button>'+
                        '</div>'+
                    '</td>'+
                '</tr>');
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
            $(document).on('click', '.btn_edit', function(e) {
                const button_edit = $(this).attr("id");
                // console.log("row_EditDragDrop'+ button_edit +'_' + i +'");
                e.preventDefault();
                e.stopPropagation();
                i++;
                $('#EditDragDrop'+button_edit).append('<tr id="row_EditDragDrop'+ i +'">'+
                    '<td>'+
                        '<div class="row">'+
                            '<select class="form-control selectpicker" data-width="500px" name="element[]" id="element" data-live-search="true">'+
                                '<option selected disabled>Pilih Kandungan</option>'+
                                '@foreach($data_kandungan as $data)'+
                                    '<option data-tokens="algk" value="{{$data->id_kandungan}}">{{$data->nama_kandungan}}</option>'+
                                '@endforeach'+
                            '</select>'+
                            '<div class="col-sm-2">'+
                                '<input type="text" name="jumlah_dosis_kandungan[]" required class="form-control" id="#" placeholder="dosis">'+
                            '</div>'+
                            '<div class="col-sm-1.5">'+
                                '<select class="form-control selectpicker" name="satuan_dosis_kandungan[]" id="#">'+
                                    '@foreach ($satuan_dosis as $Satuan_dosis)'+
                                        '<option data-tokens="algk" value="{{ $Satuan_dosis->id_dosis }}">{{ $Satuan_dosis->nama_dosis }}</option>'+
                                    '@endforeach'+
                                '</select>'+
                            '</div>'+
                            '<button class="btn btn-secondary m-1 btn-md btn-fill btn_remove" id="' +i+ '" name="remove" >x</button>'+
                        '</div>'+
                    '</td>'+
                    '</tr>');
                    $('.selectpicker').selectpicker('render');
            });
            $(document).on('click', '.btn_remove', function(e) {
                e.preventDefault();
                e.stopPropagation();
                const button_id = $(this).attr("id");
                
                $('#row_EditDragDrop'+ button_id+'').remove();
            });
        });
    </script>

@endsection
