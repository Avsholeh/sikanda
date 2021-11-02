@extends('layouts.master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', 'Upload Dokumen')

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-upload"></i>
        Upload Dokumen (Perbarui)
    </h1>
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-6">
                <!-- Upload dokumen-->
                <form action="{{ route('upload-dokumen.update', $dokumen->id) }}" method="POST"
                      enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <div class="panel panel-bordered">
                        <div class="panel-heading">
                            <p style="margin-left: 20px; margin-top: 10px; font-weight: bold">Form Dokumen Utama</p>
                        </div>
                        <div class="panel-body">
                            @include('vendor.voyager.upload.spp')
                            @include('vendor.voyager.upload.spm')
                            @include('vendor.voyager.upload.sp2d')
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
            <livewire:pendukung-list dokumenId="{{ $dokumen->id }}"/>
            @include('vendor.voyager.partials.preview_modal')
        </div>
    </div>

@stop

@include('vendor.voyager.partials.preview_script')


