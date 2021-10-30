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

                            <!-- SPP -->
                        @include('vendor.voyager.upload.spp')
                        <!-- SPP -->

                            <!-- SPM -->
                        @include('vendor.voyager.upload.spm')
                        <!-- ./SPM -->

                            <!-- SP2D -->
                        @include('vendor.voyager.upload.sp2d')
                        <!-- ./SP2D -->

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>

            <livewire:pendukung-list dokumenId="{{ $dokumen->id }}"/>

            <!-- Modal -->
            <div class="modal fade modal-primary" id="pdf_modal" data-backdrop="static">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                &times;
                            </button>
                            <h4 class="modal-title"><i class="voyager-documentation"></i>
                                <span id="modal-title-dokumen"></span>
                            </h4>
                        </div>
                        <div class="modal-body" style="padding: .3em">
                            <div id="modal-file-dokumen" style="height: 80vh"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./Modal -->
        </div>
    </div>

@stop

@include('vendor.voyager.partials.script_preview')


