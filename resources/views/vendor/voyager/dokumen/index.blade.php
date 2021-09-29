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
            <div class="col-md-6" style="margin-bottom: 0 !important;">
                <div class="panel panel-default border-primary">
                    <div class="panel-body">
                        <h4>Dinas Pendidikan</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs">
                    <li role="presentation" @if(!$status) class="active" @endif>
                        <a href="{{ route('dokumen.index') }}">Semua</a>
                    </li>
                    <li role="presentation" @if($status === 'belum-tuntas') class="active" @endif>
                        <a href="{{ route('dokumen.index', 'belum-tuntas') }}">Belum Tuntas</a>
                    </li>
                    <li role="presentation" @if($status === 'sudah-tuntas') class="active" @endif>
                        <a href="{{ route('dokumen.index', 'sudah-tuntas') }}">Sudah Tuntas</a>
                    </li>
                </ul>

                <!-- table -->
                <div class="panel panel-default">
                    <div class="panel-body">

                        <div class="panel panel-borderer">
                            <div class="panel-body">

                                <table id="dataTable" class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>
                                            <a href="http://127.0.0.1:8000/dinas?sort_order=desc&amp;order_by=kd_urusan">
                                                Dinas
                                            </a>
                                        </th>
                                        <th>
                                            <a href="http://127.0.0.1:8000/dinas?sort_order=desc&amp;order_by=kd_bidang">
                                                Tahun
                                            </a>
                                        </th>
                                        <th>
                                            <a href="http://127.0.0.1:8000/dinas?sort_order=desc&amp;order_by=kd_bidang">
                                                SPP
                                            </a>
                                        </th>
                                        <th>
                                            <a href="http://127.0.0.1:8000/dinas?sort_order=desc&amp;order_by=kd_bidang">
                                                SPM
                                            </a>
                                        </th>
                                        <th>
                                            <a href="http://127.0.0.1:8000/dinas?sort_order=desc&amp;order_by=kd_bidang">
                                                SP2D
                                            </a>
                                        </th>
                                        <th>
                                            <a href="http://127.0.0.1:8000/dinas?sort_order=desc&amp;order_by=kd_bidang">
                                                Status
                                            </a>
                                        </th>
                                        <th>
                                            <a href="http://127.0.0.1:8000/dinas?sort_order=desc&amp;order_by=kd_unit">
                                                Dibuat
                                            </a>
                                        </th>
                                        <th>
                                            <a href="http://127.0.0.1:8000/dinas?sort_order=desc&amp;order_by=kd_sub">
                                                Diperbarui
                                            </a>
                                        </th>
                                        <th class="actions text-right">Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($dokumens as $dokumen)
                                        <tr style="cursor: pointer">
                                            <td>
                                                <div>{{ $dokumen->dinas->nm_dinas ?? '-' }}</div>
                                            </td>
                                            <td>
                                                <div>{{ $dokumen->tahun }}</div>
                                            </td>
                                            <td>
                                                @if(isset($dokumen->spp->id))
                                                    <div class="badge bg-success">
                                                        <i class="voyager-check"></i>
                                                    </div>
                                                @else
                                                    <div class="badge bg-danger">
                                                        <i class="voyager-x"></i>
                                                    </div>
                                                @endif
                                            </td>

                                            <td>
                                                @if(isset($dokumen->spm->id))
                                                    <div class="badge bg-success">
                                                        <i class="voyager-check"></i>
                                                    </div>
                                                @else
                                                    <div class="badge bg-danger">
                                                        <i class="voyager-x"></i>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                @if(isset($dokumen->sp2d->id))
                                                    <div class="badge bg-success">
                                                        <i class="voyager-check"></i>
                                                    </div>
                                                @else
                                                    <div class="badge bg-danger">
                                                        <i class="voyager-x"></i>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                @if($dokumen->status === 'S')
                                                    <div class="badge bg-success">
                                                        <i class="voyager-check"></i> Tuntas
                                                    </div>
                                                @else
                                                    <div class="badge bg-danger">
                                                        <i class="voyager-x"></i> Belum Tuntas
                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                <div>{{ $dokumen->created_at }}</div>
                                            </td>
                                            <td>
                                                <div>{{ $dokumen->updated_at }}</div>
                                            </td>
                                            <td class="no-sort no-click bread-actions">
                                                <a data-toggle="modal" data-target="#dokumen_delete_modal" href="#" title="Hapus"
                                                   class="btn btn-sm btn-danger pull-right delete">
                                                    <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">Hapus</span>
                                                </a>
                                                <a href="{{ route('upload-dokumen.edit', $dokumen->id) }}" title="Ubah"
                                                   class="btn btn-sm btn-primary pull-right edit">
                                                    <i class="voyager-edit"></i> <span
                                                            class="hidden-xs hidden-sm">Perbarui</span>
                                                </a>
                                                <a href="#" title="Lihat" disabled
                                                   class="btn btn-sm btn-warning pull-right view">
                                                    <i class="voyager-eye"></i> <span
                                                            class="hidden-xs hidden-sm">Lihat</span>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                                {{ $dokumens->links() }}

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
                                <a type="button" class="btn btn-danger"
                                   href="{{ route('dokumen.delete', $dokumen->id) }}">Ya, Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ./Modal -->
            </div>
        </div>
    </div>
@stop