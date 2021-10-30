@extends('layouts.master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', 'Verifikasi Dokumen')

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-upload"></i>
        @yield('page_title')
    </h1>
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <!-- Upload dokumen-->
        <form action="{{ route('upload-dokumen.update', $dokumen->id) }}" method="POST"
              enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-bordered">
                        <div class="panel-heading">
                            <p style="margin-left: 20px; margin-top: 10px; font-weight: bold">Form Dokumen Utama</p>
                        </div>
                        <div class="panel-body">
                            <!-- SPP -->
                            <div class="panel panel-default border-success">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="">Tahun</label>
                                        <input class="form-control" type="number"
                                               value="{{ $dokumen->tahun }}" placeholder="Tahun" disabled>
                                        @error('tahun')
                                        <span class="text-danger">* {{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="">No SPP</label>
                                        <input class="form-control" type="text"
                                               value="{{ $dokumen->spp->no_spp }}" placeholder="No SPP" disabled>
                                        @error('no_spp')
                                        <span class="text-danger">* {{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>File SPP</label>
                                        <br>
                                        <button type="button" data-toggle="modal" data-target="#pdf_modal"
                                                data-jenis="spp" data-id="{{ $dokumen->spp->id }}"
                                                data-no="{{ $dokumen->spp->no_spp }}"
                                                class="btn btn-sm btn-success tampilkan"><i
                                                    class="voyager-file-text"></i> Tampilkan
                                        </button>

                                        <span class="form-group pull-right" title="Verifikasi">
                                            <input type="checkbox">
                                            <label for="">Telah diperiksa</label>
                                        </span>
                                    </div>
                                </div>
                            </div><!-- SPP -->

                            <!-- SPM -->
                            <div class="panel panel-default border-success">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="">No SPM</label>
                                        <input class="form-control" type="text"
                                               value="{{ $dokumen->spm->no_spm }}" placeholder="No SPM" disabled>
                                        @error('no_spp')
                                        <span class="text-danger">* {{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>File SPM</label>
                                        <br>
                                        <button type="button" data-toggle="modal" data-target="#pdf_modal"
                                                data-jenis="spm" data-id="{{ $dokumen->spm->id }}"
                                                data-no="{{ $dokumen->spm->no_spm }}"
                                                class="btn btn-sm btn-success tampilkan"><i
                                                    class="voyager-file-text"></i> Tampilkan
                                        </button>

                                        <span class="form-group pull-right" title="Verifikasi">
                                            <input type="checkbox">
                                            <label for="">Telah diperiksa</label>
                                        </span>
                                    </div>
                                </div>
                            </div><!-- SPM -->

                            <!-- SP2D -->
                            <div class="panel panel-default border-success">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="">No SP2D</label>
                                        <input class="form-control" type="text"
                                               value="{{ $dokumen->sp2d->no_sp2d }}" placeholder="No SP2D" disabled>
                                        @error('no_spp')
                                        <span class="text-danger">* {{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>File SPM</label>
                                        <br>
                                        <button type="button" data-toggle="modal" data-target="#pdf_modal"
                                                data-jenis="sp2d" data-id="{{ $dokumen->sp2d->id }}"
                                                data-no="{{ $dokumen->sp2d->no_sp2d }}"
                                                class="btn btn-sm btn-success tampilkan"><i
                                                    class="voyager-file-text"></i> Tampilkan
                                        </button>

                                        <span class="form-group pull-right" title="Verifikasi">
                                            <input type="checkbox">
                                            <label for="">Telah diperiksa</label>
                                        </span>
                                    </div>
                                </div>
                            </div><!-- SP2D -->
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel-heading">
                        <p style="margin-left: 20px; margin-top: 10px; font-weight: bold">Form Dokumen Utama</p>
                    </div>
                    <div class="panel-body">
                    </div>
                </div>
            </div>
        </form>

        <!-- END ROW -->

        <button type="submit" class="btn btn-primary">Proses Verifikasi</button>

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

@stop

@push('javascript')

    <script src='{{ asset('pdfobject/pdfobject.min.js') }}'></script>
    <script>
        $(function () {
            // let baseSrc = "data:application/pdf;base64,";
            let baseSrc = "{{route('voyager.dashboard')}}/viewer/";
            var options = {
                pdfOpenParams: {toolbar: '0', navpanes: '0'}
            };

            $(".tampilkan").click(function (e) {
                let dataId = $(e.target).data('id');
                let dataNo = $(e.target).data('no');
                let dataJenis = $(e.target).data('jenis');

                $("#modal-file-dokumen").attr('src', '');

                let req = $.ajax({
                    url: "{{ route('viewer.generate') }}",
                    method: "POST",
                    data: {dokumen_id: dataId, jenis_dokumen: dataJenis}
                })
                req.done(function (response, textStatus, jqXHR) {
                    var pdfLink = baseSrc + dataId + '/' + dataJenis + '/' + response;
                    PDFObject.embed(pdfLink, "#modal-file-dokumen", options);
                });
                req.fail(function (jqXHR, textStatus, errorThrown) {
                    console.log(errorThrown)
                })
                $("#modal-title-dokumen").text(dataNo);
            });
        });

    </script>

@endpush


