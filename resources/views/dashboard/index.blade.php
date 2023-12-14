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
                        <h2 class="text-black font-w600">Obat</h2>
                        <p class="mb-0"> </p>
                    </div>
                    <div>
                        <a href="javascript:void(0)" class="btn btn-primary mr-3 btn-sm" data-toggle="modal"
                            data-target="#addObat">Tambah Obat</a>
                    </div>
                </div>
                <div class="modal fade" id="addObat">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Obat</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <label class="text-black font-w500">ID Obat</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-black font-w500">Nama Dagang Obat</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-black font-w500">Kandungan + Dosis Kandungan</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-black font-w500">Dosis Obat</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-black font-w500">Satuan Obat</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-black font-w500">Nama Katagori</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-black font-w500">Nama Katagori</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-black font-w500">Nama Golongan</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-black font-w500">Nama Pabrik</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-black font-w500">Harga Jual</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-black font-w500">Status</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <button type="text" class="btn btn-primary">TAMBAH</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="editObat">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Obat</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <label class="text-black font-w500">ID Obat</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-black font-w500">Nama Dagang Obat</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-black font-w500">Kandungan + Dosis Kandungan</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-black font-w500">Dosis Obat</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-black font-w500">Satuan Obat</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-black font-w500">Nama Katagori</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-black font-w500">Nama Katagori</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-black font-w500">Nama Golongan</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-black font-w500">Nama Pabrik</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-black font-w500">Harga Jual</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-black font-w500">Status</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <button type="text" class="btn btn-primary">EDIT</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="detailObat">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Detail Obat</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <label class="text-black font-w500">ID Obat</label>
                                        <br>
                                        <label class="text-black font-w300">001</label>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-black font-w500">Nama Dagang Obat</label>
                                        <br>
                                        <label class="text-black font-w300">Panadol</label>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-black font-w500">Kandungan + Dosis Kandungan</label>
                                        <br>
                                        <label class="text-black font-w300">- Paracetamol 500mg</label>
                                        <br>
                                        <label class="text-black font-w300">- CTM 100mg</label>

                                    </div>
                                    <div class="form-group">
                                        <label class="text-black font-w500">Dosis</label>
                                        <br>
                                        <label class="text-black font-w300">- 600mg</label>
                                      
                                    </div>
                                    <div class="form-group">
                                        <label class="text-black font-w500">Satuan Obat</label>
                                        <br>
                                        <label class="text-black font-w300">Tablet</label>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-black font-w500">Nama Katagori</label>
                                        <br>
                                        <label class="text-black font-w300">Analgesik</label>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-black font-w500">Nama Golongan</label>
                                        <br>
                                        <label class="text-black font-w300">Bebas</label>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-black font-w500">Nama Pabrik</label>
                                        <br>
                                        <label class="text-black font-w300">Sanbe</label>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-responsive-md">
                                                <thead>
                                                    <tr>
                                                        
                                                        <th><strong>Tanggal Beli</strong></th>
                                                        <th><strong>Expired Date</strong></th>
                    
                                                        <th><strong>Harga Beli</strong></th>
                                                        <th><strong>Harga Jual</strong></th>
                    
                                                        <th><strong>Sisa Stok</strong></th>
                                                        <th><strong>Status</strong></th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        
                                                            <td>1/1/2022</td>
                                                            <td>2/2/2024</td>
                                                            <td>2000</td>
                                                            <td>3000</td>
                                                            <td>43</td>
                                                            <td>Continue</td>
                                                        
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-header">
                    <h4 class="card-title">Daftar Master Obat</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
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

                                    <th><strong>Kandungan + Dosis Kandungan</strong></th>
                                    <th><strong>Dosis Obat</strong></th>

                                    <th><strong>Satuan</strong></th>
                                    <th><strong>Nama Katagori</strong></th>
                                    <th><strong>Action</strong></th>
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
                                    <td><strong>001</strong></td>
                                    <td>
                                        <div class="d-flex align-items-center"> <span aria-rowspan="2"
                                                class="w-space-no">Panadol</span>
                                        </div>
                                    </td>
                                        <td>Paracetamol 500mg</td>
                                        <td>500mg</td>
                                        <td>Tablet</td>
                                        <td>Antibiotik</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"
                                                data-toggle="modal" data-target="#editObat"><i
                                                    class="fa fa-pencil"></i></a>
                                            <a href="#" class="btn btn-dark shadow btn-xs sharp" data-toggle="modal"
                                                data-target="#detailObat"><i class="fa fa-eye"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
