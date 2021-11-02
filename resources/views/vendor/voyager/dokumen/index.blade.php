@extends('layouts.master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', 'Dokumen')

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-upload"></i> @yield('page_title')
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
                    <li role="presentation" @if($status === \App\Models\Dokumen::SUDAH_TUNTAS) class="active" @endif>
                        <a href="{{ route('dokumen.index', 'sudah-tuntas') }}">Sudah Tuntas</a>
                    </li>
                    <li role="presentation" @if($status === \App\Models\Dokumen::BELUM_TUNTAS) class="active" @endif>
                        <a href="{{ route('dokumen.index', 'belum-tuntas') }}">Belum Tuntas</a>
                    </li>
                    <li role="presentation" @if($status === \App\Models\Dokumen::VERIFIKASI) class="active" @endif>
                        <a href="{{ route('dokumen.index', 'verifikasi') }}">Verifikasi</a>
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
                                            <th class="hidden-xs hidden-sm">Tahun</th>
                                            <th>SPP</th>
                                            <th class="hidden-xs hidden-sm">SPM</th>
                                            <th class="hidden-xs hidden-sm">SP2D</th>
                                            <th>Status</th>
                                            <th class="hidden-xs hidden-sm">Dibuat</th>
                                            <th class="hidden-xs hidden-sm">Diperbarui</th>
                                            @if($status === \App\Models\Dokumen::VERIFIKASI)
                                                <th>Verifikasi oleh</th>
                                            @endif
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($dokumens as $index => $dokumen)
                                            <tr style="cursor: pointer">
                                                <td>{{($dokumens->currentPage() - 1) * $dokumens->perPage() + $loop->iteration}}</td>
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
                                                    @switch($dokumen->status)
                                                        @case(\App\Models\Dokumen::SUDAH_TUNTAS)
                                                        <div class="badge badge-primary">Sudah Tuntas</div>
                                                        @break
                                                        @case(\App\Models\Dokumen::BELUM_TUNTAS)
                                                        <div class="badge badge-danger">Belum Tuntas</div>
                                                        @break
                                                        @case(\App\Models\Dokumen::VERIFIKASI)
                                                        <div class="badge badge-success">
                                                            <i class="voyager-check"></i>&nbsp;&nbsp;Verifikasi
                                                        </div>
                                                        @break
                                                    @endswitch
                                                </td>
                                                <td class="hidden-xs hidden-sm">
                                                    <div>{{ $dokumen->created_at }}</div>
                                                </td>
                                                <td class="hidden-xs hidden-sm">
                                                    <div>{{ $dokumen->updated_at }}</div>
                                                </td>
                                                @if($status === \App\Models\Dokumen::VERIFIKASI)
                                                    <td class="hidden-xs hidden-sm">
                                                        <div>{{ $dokumen->verifikasi_oleh }}</div>
                                                    </td>
                                                @endif
                                                <td class="no-sort no-click bread-actions">
                                                    @if($dokumen->status !== \App\Models\Dokumen::VERIFIKASI)
                                                        @can('delete', $dokumen)
                                                            <a data-toggle="modal" data-target="#dokumen_delete_modal"
                                                               href="#" title="Hapus"
                                                               data-url="{{ route('dokumen.delete', $dokumen->id) }}"
                                                               class="btn btn-sm btn-danger pull-right btn-delete">
                                                                <i class="voyager-trash"></i>
                                                                <!-- Delete -->
                                                            </a>
                                                        @endcan
                                                        <a href="{{ route('upload-dokumen.edit', $dokumen->id) }}"
                                                           title="Ubah"
                                                           class="btn btn-sm btn-primary pull-right edit">
                                                            <i class="voyager-edit"></i>
                                                            <!-- Edit -->
                                                        </a>

                                                        @if($dokumen->status === \App\Models\Dokumen::SUDAH_TUNTAS)
                                                            <a href="{{ route('verifikasi.show', $dokumen->id) }}"
                                                               title="Verifikasi"
                                                               class="btn btn-sm btn-success pull-right edit">
                                                                <i class="voyager-check"></i>
                                                                <!-- Verifikasi -->
                                                            </a>
                                                        @endif
                                                    @else
                                                        @if(in_array(auth()->user()->custom_role->id, [
                                                            \App\Models\User::$ROLE_SUPERADMIN,
                                                            \App\Models\User::$ROLE_DEV
                                                        ]))
                                                            <a data-toggle="modal" data-target="#dokumen_delete_modal"
                                                               href="#" title="Hapus"
                                                               data-url="{{ route('dokumen.delete', $dokumen->id) }}"
                                                               class="btn btn-sm btn-danger pull-right btn-delete">
                                                                <i class="voyager-trash"></i>
                                                            </a>
                                                        @endif
                                                        <a href="{{ route('dokumen.show', $dokumen->id) }}"
                                                           title="Lihat"
                                                           class="btn btn-sm btn-warning pull-right view">
                                                            <i class="voyager-eye"></i>
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>

                                    </table>
                                    {{ $dokumens->links() }}
                                @else
                                    Dokumen belum tersedia.
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
                                <a id="btn-delete-modal" type="button" class="btn btn-danger" href="#">
                                    Ya, Hapus
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ./Modal -->
            </div>
        </div>
    </div>
@stop

@push('javascript')
    <script>
        $(document).ready(function () {
            $(".btn-delete").click(function () {
                $url = $(this).data('url');
                $("#btn-delete-modal").attr('href', $url)
            });
        });
    </script>
@endpush