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
                        <h2 class="text-black font-w600">Manajemen Golongan Obat</h2>
                        <p class="mb-0"> </p>
                    </div>
                </div>

                    <div class="card-header">
                        <h4 class="card-title">Daftar Obat & Golongannya</h4>
                        <div class="row">
                            <a href="/kelolagolongan" class="btn btn-primary mr-3 btn-sm">Kelola Master Golongan</a>
                            {{-- <a href="javascript:void(0)" class="btn btn-primary mr-3 btn-sm" data-toggle="modal"
                                data-target="#addGolongan">Tambah</a> --}}
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example5" class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th class="width50">
                                            <div class="custom-control custom-checkbox checkbox-success check-lg mr-3">
                                                <input type="checkbox" class="custom-control-input" id="checkAll"
                                                    required="">
                                                <label class="custom-control-label" for="checkAll"></label>
                                            </div>
                                        </th>
                                        <th><strong>ID</strong></th>
                                        <th><strong>Nama Obat</strong></th>
                                        <th><strong>Golongan</strong></th>
                                        {{-- <th class="text-center"><strong>Action</strong></th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_golongan_obat as $data)
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox checkbox-success check-lg mr-3">
                                                <input type="checkbox" class="custom-control-input" id="customCheckBox2"
                                                    required="">
                                                <label class="custom-control-label" for="customCheckBox2"></label>
                                            </div>
                                        </td>
                                        <td>{{$data->ID}}</td>
                                        <td>
                                            <div class="d-flex align-items-center"> <span aria-rowspan="2"
                                                    class="w-space-no">{{$data->nama_dagang_obat}}</span>
                                            </div>
                                        </td>
                                        <td>{{$data->nama_golongan}}</td>
                                        {{-- <td class='right-align-class'>
                                            <div class="dropdown ml-auto text-center">
                                                <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"
                                                    data-toggle="modal" data-target="#editGolongan"><i
                                                        class="fa fa-pencil"></i></a>
                                                <a href="#" class="btn btn-secondary shadow btn-xs sharp"
                                                    data-toggle="modal" data-target="#detailGolongan"><i
                                                        class="fa fa-eye"></i></a>
                                            </div>
                                        </td> --}}
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
