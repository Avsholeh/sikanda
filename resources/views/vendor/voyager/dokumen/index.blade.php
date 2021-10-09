@extends('layouts.master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', 'Dokumen Saya')

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-upload"></i>
        Dokumen Saya
    </h1>
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs">
                    <li role="presentation" @if($status === 'semua') class="active" @endif>
                        <a href="{{ route('dokumen.index', 'semua') }}">Semua</a>
                    </li>
                    <li role="presentation" @if($status === 's') class="active" @endif>
                        <a href="{{ route('dokumen.index', 'sudah-tuntas') }}">Sudah Tuntas</a>
                    </li>
                    <li role="presentation" @if($status === 'b') class="active" @endif>
                        <a href="{{ route('dokumen.index', 'belum-tuntas') }}">Belum Tuntas</a>
                    </li>
                </ul>

                <!-- table -->
                <div class="panel panel-default">
                    <div class="panel-body">

                        <div class="panel panel-borderer">
                            <div class="panel-body">

                                @if(count($dokumens))
                                    <table id="dataTable" class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            {{--                                            <th class="hidden-xs hidden-sm">Dinas</th>--}}
                                            <th class="hidden-xs hidden-sm">Tahun</th>
                                            <th>SPP</th>
                                            <th class="hidden-xs hidden-sm">SPM</th>
                                            <th class="hidden-xs hidden-sm">SP2D</th>
                                            <th>Status</th>
                                            <th class="hidden-xs hidden-sm">Dibuat</th>
                                            <th class="hidden-xs hidden-sm">Diperbarui</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($dokumens as $dokumen)
                                            <tr style="cursor: pointer">
                                                <td>{{ $loop->iteration }}</td>
                                                <td class="hidden-xs hidden-sm">
                                                    <div>{{ $dokumen->tahun }}</div>
                                                </td>
                                                <td>
                                                    @if(isset($dokumen->spp->id))
                                                        {{ $dokumen->spp->no_spp }}
                                                    @else
                                                        <span>-</span>
                                                    @endif
                                                </td>
                                                <td class="hidden-xs hidden-sm">
                                                    @if(isset($dokumen->spm->id))
                                                        {{ $dokumen->spm->no_spm }}
                                                    @else
                                                        <span>-</span>
                                                    @endif
                                                </td>
                                                <td class="hidden-xs hidden-sm">
                                                    @if(isset($dokumen->sp2d->id))
                                                        {{ $dokumen->sp2d->no_sp2d }}
                                                    @else
                                                        <span>-</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($dokumen->status === 'S')
                                                        <div class="badge bg-success">Sudah Tuntas</div>
                                                    @else
                                                        <div class="badge bg-danger">Belum Tuntas</div>
                                                    @endif
                                                </td>
                                                <td class="hidden-xs hidden-sm">
                                                    <div>{{ $dokumen->created_at }}</div>
                                                </td>
                                                <td class="hidden-xs hidden-sm">
                                                    <div>{{ $dokumen->updated_at }}</div>
                                                </td>
                                                <td class="no-sort no-click bread-actions">
                                                    @can('delete', $dokumen)
                                                        <a data-toggle="modal" data-target="#dokumen_delete_modal"
                                                           href="#" title="Hapus"
                                                           class="btn btn-sm btn-danger pull-right delete">
                                                            <i class="voyager-trash"></i>
                                                            {{--<span class="hidden-xs hidden-sm">Hapus</span>--}}
                                                        </a>
                                                    @endcan
                                                    <a href="{{ route('upload-dokumen.edit', $dokumen->id) }}"
                                                       title="Ubah"
                                                       class="btn btn-sm btn-primary pull-right edit">
                                                        <i class="voyager-edit"></i>
                                                        {{--<span class="hidden-xs hidden-sm">Ubah</span>--}}
                                                    </a>
                                                    {{--<a href="#" title="Lihat" disabled
                                                       class="btn btn-sm btn-warning pull-right view">
                                                        <i class="voyager-eye"></i>
                                                    </a>--}}
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>

                                    </table>
                                    {{ $dokumens->links() }}
                                @else
                                    Data belum tersedia.
                                @endif

                            </div>
                        </div>

                    </div>
                </div>
                <!-- ./table -->

                <!-- Modal -->
                <div class="modal fade modal-danger" id="dokumen_delete_modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    &times;
                                </button>
                                <h4 class="modal-title"><i class="voyager-warning"></i>
                                    Konfirmasi hapus
                                </h4>
                            </div>

                            <div class="modal-body">
                                <h4>Yakin untuk menghapus dokumen ini?</h4>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                @if(count($dokumens))
                                    <a type="button" class="btn btn-danger"
                                       href="{{ route('dokumen.delete', $dokumen->id) }}">
                                        Ya, Hapus
                                    </a>
                                @else
                                    <a type="button" class="btn btn-danger" href="#">
                                        Ya, Hapus
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ./Modal -->
            </div>
        </div>
    </div>
@stop