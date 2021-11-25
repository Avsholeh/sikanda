@extends('layouts.master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', 'Log Aktivitas')

@section('page_header')
    <h1 class="page-title">
        <i class="icon voyager-compass"></i> @yield('page_title')
    </h1>
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">

            <div class="col-md-12">
                <button type="button" class="btn btn-danger text-danger"
                        data-toggle="modal" data-target="#activity_log_delete_modal">
                    <i class="voyager-trash"></i> Hapus Semua
                </button>

                <!-- Modal -->
                <div class="modal fade modal-danger" id="activity_log_delete_modal">
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
                                <h4>Yakin untuk menghapus data ini?</h4>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                <form action="{{ route('activity_log.clear') }}" method="post">
                                    @csrf
                                    <input class="btn btn-danger" type="submit" value="Ya, Hapus">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ./Modal -->
            </div>

            <div class="col-md-12">
                <!-- table -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        @if(count($activityLogs))
                            <table id="dataTable" class="table table-hover">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                    <th>Data</th>
                                    <th>Alamat IP</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($activityLogs as $index => $activityLog)
                                    <tr style="cursor: pointer">
                                        <td>{{ ++$index }}</td>
                                        <td>{{ $activityLog->created_at }}</td>
                                        <td>{{ $activityLog->action }}</td>
                                        <td>{{ $activityLog->data }}</td>
                                        <td>{{ $activityLog->ip_addr }}</td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                            {{ $activityLogs->links() }}
                        @else
                            Log aktivitas belum tersedia.
                        @endif

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