@extends('layouts.master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', 'Upload Dokumen')

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-upload"></i>
        Upload Dokumen
    </h1>
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-6">
                <form action="">
                    @csrf
                    <div class="panel panel-bordered">
                        <div class="panel-heading">
                            <p style="margin-left: 20px; margin-top: 10px; font-weight: bold">Dokumen Utama</p>
                        </div>
                        <div class="panel-body">
                            <div class="panel panel-default border-success">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="">No SPP</label>
                                        <input class="form-control" name="no_spp" type="text" placeholder="No SPP">
                                    </div>

                                    <div class="form-group">
                                        <label>File SPP</label>
                                        <input type="file" name="file_spp">
                                    </div>

                                    <div class="form-group">
                                        <label>Status</label>
                                        <div class="alert alert-success" style="margin-bottom: 0 !important;">
                                            Sudah Upload
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default border-danger">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label>No SPM</label>
                                        <input class="form-control" name="no_spm" type="text" placeholder="No SPM">
                                    </div>

                                    <div class="form-group">
                                        <label>File SPM</label>
                                        <input type="file" name="file_spm" placeholder="No SPM">
                                    </div>

                                    <div class="form-group">
                                        <label>Status</label>
                                        <div class="alert alert-danger" style="margin-bottom: 0 !important;">
                                            Belum
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label>No SP2D</label>
                                        <input class="form-control" name="no_sp2d" type="text" placeholder="No SP2D">
                                    </div>

                                    <div class="form-group">
                                        <label>File SP2D</label>
                                        <input type="file" name="file_sp2d">
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <div class="panel panel-bordered">
                    <div class="panel-heading">
                        <p style="margin-left: 20px; margin-top: 10px; font-weight: bold">Dokumen Pendukung</p>
                    </div>
                    <div class="panel-body">
                        <form action="#">
                            <div class="form-group">
                                <label>Nama Dokumen</label>
                                <input type="text" class="form-control" id="nama_dokumen" name="nama_dokumen"
                                       placeholder="Nama Dokumen">
                            </div>
                            <div class="form-group">
                                <label>File Dokumen</label>
                                <input type="file" placeholder="File Dokumen">
                            </div>
                        </form>
                        <button class="btn btn-warning">Tambahkan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
