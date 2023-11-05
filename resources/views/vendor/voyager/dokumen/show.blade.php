@extends('layouts.master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', 'Lihat Dokumen')

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
                        <table class="table table-hover table-striped table-responsive">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Dinas</th>
                                <th>Tahun</th>
                                <th>Jenis</th>
                                <th>No</th>
                                <th>File</th>
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
                                            data-no="{{ $dokumen->spp->no_spp }}" title="Tampilkan"
                                            class="btn btn-sm btn-primary tampilkan"><i
                                                class="voyager-file-text"></i>
                                    </button>
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
                                            data-no="{{ $dokumen->spm->no_spm }}" title="Tampilkan"
                                            class="btn btn-sm btn-primary tampilkan"><i
                                                class="voyager-file-text"></i>
                                    </button>
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
                                            data-no="{{ $dokumen->sp2d->no_sp2d }}" title="Tampilkan"
                                            class="btn btn-sm btn-primary tampilkan">
                                        <i class="voyager-file-text"></i>
                                    </button>
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
                                                data-no="{{ $pendukung->nama_dokumen }}" title="Tampilkan"
                                                class="btn btn-sm btn-primary tampilkan">
                                            <i class="voyager-file-text"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <a class="btn btn-primary" href="{{ route('dokumen.index', 'verifikasi') }}">Kembali</a>
                    </div>
                </div>
                <!-- END ROW -->
            </div>
        </div>
        @include('vendor.voyager.partials.preview_modal')
    </div>
@stop
@include('vendor.voyager.partials.preview_script')


