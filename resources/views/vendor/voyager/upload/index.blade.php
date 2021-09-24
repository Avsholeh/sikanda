@extends('voyager::master')

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
                <div class="panel panel-bordered">
                    <div class="panel-heading">
                        <p style="margin-left: 20px; margin-top: 10px; font-weight: bold">Dokumen Utama</p>
                    </div>
                    <div class="panel-body">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label>No SPP</label>
                                    <input class="form-control" name="no_spp" type="text" placeholder="No SPP">
                                </div>

                                <div class="form-group">
                                    <label>File SPP</label>
                                    <input type="file" name="file_spp">
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label>No SPM</label>
                                    <input class="form-control" name="no_spm" type="text">
                                </div>

                                <div class="form-group">
                                    <label>File SPM</label>
                                    <input type="file" name="file_spm">
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label>No SP2D</label>
                                    <input class="form-control" name="no_sp2d" type="text">
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
                        <button class="btn btn-primary">Upload</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
