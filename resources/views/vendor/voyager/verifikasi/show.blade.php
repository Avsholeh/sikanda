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
        <div class="row">
            <div class="col-md-12">
                <!-- Upload dokumen-->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form action="{{ route('upload-dokumen.update', $dokumen->id) }}" method="POST"
                              enctype="multipart/form-data" autocomplete="off">
                            @csrf

                            <table class="table table-hover table-striped table-responsive">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Dinas</th>
                                    <th>Tahun</th>
                                    <th>Jenis</th>
                                    <th>No</th>
                                    <th>File</th>
                                    <th width="30%">Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>{{ $dokumen->dinas->nm_dinas }}</td>
                                    <td>{{ $dokumen->tahun }}</td>
                                    <td>SPP</td>
                                    <td>{{ $dokumen->spp->no_spp }}</td>
                                    <td>
                                        <button type="button" data-toggle="modal" data-target="#pdf_modal"
                                                data-jenis="spp" data-id="{{ $dokumen->spp->id }}"
                                                data-no="{{ $dokumen->spp->no_spp }}"
                                                class="btn btn-sm btn-danger tampilkan"><i
                                                    class="voyager-file-text"></i>
                                        </button>
                                    </td>
                                    <td>
                                <span class="form-group" title="Verifikasi">
                                    <input type="checkbox" name="check_spp">
                                    <label for="">Verifikasi</label>
                                </span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>2</td>
                                    <td>{{ $dokumen->dinas->nm_dinas }}</td>
                                    <td>{{ $dokumen->tahun }}</td>
                                    <td>SPM</td>
                                    <td>{{ $dokumen->spm->no_spm }}</td>
                                    <td>
                                        <button type="button" data-toggle="modal" data-target="#pdf_modal"
                                                data-jenis="spm" data-id="{{ $dokumen->spm->id }}"
                                                data-no="{{ $dokumen->spm->no_spm }}"
                                                class="btn btn-sm btn-danger tampilkan"><i
                                                    class="voyager-file-text"></i>
                                        </button>
                                    </td>
                                    <td>
                                <span class="form-group" title="Verifikasi">
                                    <input type="checkbox" name="check_spp">
                                    <label for="">Verifikasi</label>
                                </span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>3</td>
                                    <td>{{ $dokumen->dinas->nm_dinas }}</td>
                                    <td>{{ $dokumen->tahun }}</td>
                                    <td>SP2D</td>
                                    <td>{{ $dokumen->sp2d->no_sp2d }}</td>
                                    <td>
                                        <button type="button" data-toggle="modal" data-target="#pdf_modal"
                                                data-jenis="sp2d" data-id="{{ $dokumen->sp2d->id }}"
                                                data-no="{{ $dokumen->sp2d->no_sp2d }}"
                                                class="btn btn-sm btn-danger tampilkan">
                                            <i class="voyager-file-text"></i>
                                        </button>
                                    </td>
                                    <td>
                                <span class="form-group" title="Verifikasi">
                                    <input type="checkbox" name="check_spp">
                                    <label for="">Verifikasi</label>
                                </span>
                                    </td>
                                </tr>

                                @foreach($dokumen->pendukung as $index => $pendukung)
                                    <tr>
                                        <td>{{ $index + 4 }}</td>
                                        <td>{{ $dokumen->dinas->nm_dinas }}</td>
                                        <td>{{ $dokumen->tahun }}</td>
                                        <td>PENDUKUNG</td>
                                        <td>{{ $pendukung->nama_dokumen }}</td>
                                        <td>
                                            <button type="button" data-toggle="modal" data-target="#pdf_modal"
                                                    data-jenis="pendukung" data-id="{{ $pendukung->id }}"
                                                    data-no="{{ $pendukung->nama_dokumen }}"
                                                    class="btn btn-sm btn-danger tampilkan">
                                                <i class="voyager-file-text"></i>
                                            </button>
                                        </td>
                                        <td>
                                <span class="form-group" title="Verifikasi">
                                    <input type="checkbox" name="check_spp">
                                    <label for="">Verifikasi</label>
                                </span>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <button type="submit" class="btn btn-lg btn-primary">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
                <!-- END ROW -->

            </div>
        </div>

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

@include('vendor.voyager.partials.script_preview')


