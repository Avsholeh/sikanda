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
                <form action="{{ route('upload-dokumen.update', $dokumen->id) }}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="panel panel-bordered">
                        <div class="panel-heading">
                            <p style="margin-left: 20px; margin-top: 10px; font-weight: bold">Dokumen Utama</p>
                        </div>
                        <div class="panel-body">

                            <!-- SPP -->
                        @include('vendor.voyager.upload.spp')
                        <!-- SPP -->

                            <!-- SPM -->
                        @include('vendor.voyager.upload.spm')
                        <!-- ./SPM -->

                            <!-- SP2D -->
                        @include('vendor.voyager.upload.sp2d')
                        <!-- ./SP2D -->

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
                        <div class="panel panel-default">
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
        </div>
    </div>

@stop

@push('javascript')
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@endpush


