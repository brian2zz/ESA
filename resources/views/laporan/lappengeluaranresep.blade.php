{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')
    <!-- row -->
    <div class="col-lg-12">
        <div class="card">
            <div class="container-fluid">
                <div class="form-head align-items-center d-flex mb-sm-4 mb-3">
                    <div class="mr-auto">
                        <h2 class="text-black font-w600">Laporan Pengeluaran Resep</h2>
                        <p class="mb-0"> </p>
                    </div>           
                    {{-- <div> --}}
                        {{-- <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#addObat">Tambah<span
                            class="btn-icon-right" ><i class="fa fa-plus"></i></span>
                        </button> --}}
                    {{-- </div> --}}                  
                </div>
                <div class="card-header">
                    <div class="modal-body">
                        <form>
                            <h4 class="card-title">Search</h4>
                            &ensp;
                            <div class="form-group row">
                                <label for="#" class="col-sm-2 col-form-label ">Tanggal</label>
                                <div class="col-sm-4">
                                    <a>
                                        <input class="form-control input-daterange-datepicker" type="text" name="daterange" value="01/01/2015 - 01/31/2015">
                                    </a>              
                                </div>
                                <div class="form-group">
                                    <button type="text" class="btn btn-primary btn-m"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="container-fluid">
                        <div class="card-header">
                            <h4 class="card-title">Pengeluaran Obat Tanggal 2 Februari 2022</h4>
                            <a href="javascript:void(0)" class="btn btn-primary mr-3 btn-sm" data-toggle="modal"
                                data-target="#ExportLapKatagori">Export Excel</a>
                        </div>
                <div class="card-body">
                    <div class="table-responsive">             
                        <table id="example5" class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th class="width50">
                                        <div class="custom-control custom-checkbox checkbox-success check-lg mr-3">
                                            <input type="checkbox" class="custom-control-input" id="checkAll" required="">
                                            <label class="custom-control-label" for="checkAll"></label>
                                        </div>
                                    </th>   
                                    <th><strong>No.&nbsp;</strong></th>                      
                                    <th><strong>Nama Obat</strong></th>
                                    <th><strong>Dosis Obat</strong></th>
                                    <th><strong>Stok Awal</strong></th>
                                    <th><strong>Jumlah Penerimaan</strong></th>
                                    <th><strong>Obat ED (Expired)</strong></th>
                                    <th><strong>Total Pengeluaran</strong></th>
                                    <th><strong>Sisa</strong></th>                              
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox checkbox-success check-lg mr-3">
                                            <input type="checkbox" class="custom-control-input" id="customCheckBox2"
                                                required="">
                                            <label class="custom-control-label" for="customCheckBox2"></label>
                                        </div>
                                    </td>
                                        <td>1</td>
                                        <td>Panadol</td>
                                        <td>300ml</td>
                                        <td>30</td>
                                        <td>54</td>
                                        <td>Padadol (2/2/2022)</td>
                                        <td>5400</td>
                                        <td>54</td>                         
                                </tr>
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox checkbox-success check-lg mr-3">
                                            <input type="checkbox" class="custom-control-input" id="customCheckBox2"
                                                required="">
                                            <label class="custom-control-label" for="customCheckBox2"></label>
                                        </div>
                                    </td>
                                        <td>2</td>
                                        <td>Panadol</td>
                                        <td>300ml</td>
                                        <td>30</td>
                                        <td>54</td>
                                        <td>Padadol (2/2/2022)</td>
                                        <td>5400</td>
                                        <td>54</td>                         
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
