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
                            <iframe id="modal-file-dokumen" src="" height="600" width="100%"></iframe>
                            {{--                                <canvas id="pdf_renderer"></canvas>--}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./Modal -->
        </div>
    </div>

@stop

@push('javascript')
    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.943/pdf.min.js"></script>--}}
    <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
    <script>
        $(function () {
            let baseSrc = "data:application/pdf;base64,";
            let fileDokumen = "";
            $('[data-toggle="tooltip"]').tooltip()
            $(".tampilkan").click(function (e) {
                let dataNo = $(e.target).data('no');
                let dataJenis = $(e.target).data('jenis');
                let request = $.ajax({
                    url: "{{ route('viewer.pdf') }}",
                    method: "POST",
                    data: {jenis_dokumen: dataJenis, no_dokumen: dataNo}
                })
                request.done(function (response, textStatus, jqXHR) {
                    // $("#modal-file-dokumen").attr('src', baseSrc + response.file);
                    // $("#modal-file-dokumen").attr('src', baseSrc + response.file);
                });
                request.fail(function (jqXHR, textStatus, errorThrown) {

                })
                $("#modal-title-dokumen").text(dataNo);
            });
        });

    </script>
@endpush


